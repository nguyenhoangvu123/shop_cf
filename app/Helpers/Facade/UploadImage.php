<?php

namespace App\Helpers\Facade;

use Illuminate\Support\Facades\Facade;

class UploadImage extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'fileUpload';
    }
}
