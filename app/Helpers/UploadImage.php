<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Testing\MimeType;
use Illuminate\Support\Facades\Storage;

class UploadImage
{

    const FILE_PUBLIC = 'public';
    protected $storage;
    protected $error = false;
    protected $link;

    public function __construct()
    {
        $this->storage = Storage::disk(self::FILE_PUBLIC);
    }
    /**
     * Create file name unique
     * @param string $fileNameUpload
     * @return object
     */

    public function createFileNameUnique($fileNameUpload)
    {
        $uuid = Str::uuid();
        $time = Carbon::now()->timestamp;
        $fileName = $uuid . $time . $fileNameUpload;
        return $fileName;
    }


    /**
     * format file standard
     * @param $file
     * @return mixed
     */

    public function formatFile($file)
    {
        if (is_string($file)) {
            $file = $this->pathToUploadedFile($file);
        }
        return $file;
    }

    public function pathToUploadedFile($path)
    {
        $filesystem = new Filesystem;
        $name = $filesystem->name($path);
        $extension = $filesystem->extension($path);
        $originalName = $name . '.' . $extension;
        $mimeType = MimeType::from($path);
        $file =  new UploadedFile($path, $originalName, $mimeType, true);
        return $file;
    }

    /**
     * set path file
     * @param string $fileNameUpload
     * @param string $path
     * @return string
     */

    public function setPathFile($fileNameUpload, $path)
    {
        $fileName = $this->createFileNameUnique($fileNameUpload);
        $pathFile = $path . '/' . $fileName;
        return $pathFile;
    }

    /**
     * get file name upload
     * @param string|object $file
     * @return string
     */

    public function getFileNameUpload($file)
    {

        $fileNameUpload = $file->getClientOriginalName();
        return $fileNameUpload;
    }

    /**
     * upload single file S3
     * @param string|object $file
     * @param string $pathFile
     * @return object
     */

    public function uploadSingle($file, $path)
    {
        $fileFormat = $this->formatFile($file);
        $fileNameUpload = $this->getFileNameUpload($fileFormat);
        $pathFile = $this->setPathFile($fileNameUpload, $path);
        $this->storage->put($pathFile, file_get_contents($fileFormat), self::FILE_PUBLIC);
        $link = $this->getRealPath($pathFile);
        $this->link = $link;
        return $this;
    }

    /**
     * upload mutiple file S3
     * @param array $files
     * @param string $pathFile
     */

    public function uploadMutiple($files, $path)
    {
        $listLink = [];
        foreach ($files as $file) {
            $fileFormat = $this->formatFile($file);
            $fileNameUpload = $this->getFileNameUpload($fileFormat);
            $pathFile = $this->setPathFile($fileNameUpload, $path);
            $this->storage->put($pathFile, file_get_contents($fileFormat), self::FILE_PUBLIC);
            $link = $this->getRealPath($pathFile);
            $listLink[] = $link;
        }
        $this->link = $listLink;
        return $this;
    }

    /**
     * get real path
     * @param string $pathFile
     */

    public function getRealPath($pathFile)
    {
        $link = '';
        $host = request()->getSchemeAndHttpHost();
        if ($this->storage->exists($pathFile)) {
            $link =  $host . Storage::url($pathFile);
        }
        return $link;
    }


    /**
     * set respone error
     * @return object
     */

    public function setError()
    {
        return $this->error = false;
    }

    /**
     * response
     * @return array
     */

    public function response()
    {
        return [
            'error' => $this->error,
            'link' => $this->link,
        ];
    }

    /**
     * response upload file 
     * @param  $file
     * @param string $path
     * @return string|array
     */

    public function responseUploadFile($file, $path)
    {

        try {
            if (is_string($file) || is_object($file)) {
                $response = $this->uploadSingle($file, $path)
                    ->response();
            } else {
                $response = $this->uploadMutiple($file, $path)
                    ->response();
            }
            return $response;
        } catch (\exception $e) {
            Log::info("upload file failed :  " . $e->getMessage());
            $this->error = true;
            $this->link = '';
            return $this->response();
        }
    }

    /**
     * delete file 
     * @param string $file
     * @param string $path
     * @return void
     */

    public function deleteImage($file, $path)
    {
        $filesystem = new Filesystem;
        $name = $filesystem->name($file);
        $extension = $filesystem->extension($file);
        $originalName = $name . '.' . $extension;
        if (Storage::exists('public/' . $path . '/' . $originalName)) {
            Storage::delete('public/' . $path . '/' . $originalName);
        }
    }
}
