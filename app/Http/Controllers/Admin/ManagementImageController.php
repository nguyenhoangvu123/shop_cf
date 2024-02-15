<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Facade\UploadImage;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Image\SortSliderRequest;
use App\Http\Requests\Admin\Image\StoreSliderRequest;
use App\Http\Requests\Admin\Image\UpdateSliderRequest;

class ManagementImageController extends Controller
{

    public function __construct(protected Image $image)
    {
    }

    public function index()
    {
        $listSlider = $this->image
            ->where("image_type", $this->image::TYPE_IMAGE_SLIDER)
            ->orderBy('image_position', 'DESC')
            ->get();
        return view('admin.pages.images.slider.index', ['listSlider' => $listSlider]);
    }

    public function listSlider(Request $request)
    {

        $listSlider = $this->image
            ->filter($request)
            ->where("image_type", $this->image::TYPE_IMAGE_SLIDER)
            ->orderBy('image_position', 'ASC')
            ->get();
        $view = view('admin.pages.images.slider.list', [
            'listSlider' => $listSlider
        ])->render();
        return [
            'error' => false,
            'data' => $view
        ];
    }

    public function editSlider($id)
    {
        $slider = $this->image->find($id);
        if (!$slider) {
            return [
                'error' => true,
                'message' => 'ảnh không tồn tại'
            ];
        }

        $view = view('admin.pages.images.slider.edit', [
            "slider" => $slider
        ])->render();
        return response()->json([
            'error' => false,
            'data' => $view
        ]);
    }

    public function storeSlider(StoreSliderRequest $request)
    {
        try {

            $uploadImage = [
                'error' => true,
                'link' => null
            ];
            if ($request->image) {
                $uploadImage = UploadImage::responseUploadFile($request->image, $this->image::FILE_UPLOAD_SLIDER);
            }

            if ($uploadImage['error']) {
                return [
                    'error' => true,
                    'message' => 'Thêm slider thất bại'
                ];
            }
            $position = $this->image->getPositionLasted($this->image::TYPE_IMAGE_SLIDER);
            $dataInsert = [
                'image_link' => $uploadImage['link'],
                'image_type' => $this->image::TYPE_IMAGE_SLIDER,
                'image_status' => $request->status,
                'image_position' => $position
            ];

            $insertSlider = $this->image->create($dataInsert);
            if (!$insertSlider) {
                return [
                    'error' => true,
                    'message' => 'Thêm slider thất bại'
                ];
            }
            return [
                'error' => false,
                'message' => 'Thêm slider thành công'
            ];
        } catch (\Exception $ex) {
            Log::info("store slider failed: " . $ex->getMessage());
        }
    }

    public function updateSlider(UpdateSliderRequest $request, $id)
    {
        try {
            $slider = $this->image->find($id);
            if (!$slider) return [
                'error' => true,
                'message' => 'Cập nhật ảnh thất bại'
            ];
            $uploadImage = [
                'error' => true,
                'link' => null
            ];
            $link = $slider->image_link;
            if ($request->image) {
                UploadImage::deleteImage($slider->image_link, $this->image::FILE_UPLOAD_SLIDER);
                $uploadImage = UploadImage::responseUploadFile($request->image, $this->image::FILE_UPLOAD_SLIDER);
                if ($uploadImage['error']) {
                    return [
                        'error' => true,
                        'message' => 'Thêm slider thất bại'
                    ];
                }
                $link = $uploadImage['link'];
            }
            $dataUpdate = [
                'image_link' => $link,
                'image_type' => $this->image::TYPE_IMAGE_SLIDER,
                'image_status' => $request->status,
                'image_position' => $slider->image_position
            ];
            $updateSlider = $slider->update($dataUpdate);
            if (!$updateSlider) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật slider thất bại'
                ];
            }
            return [
                'error' => false,
                'message' => 'Cập nhật slider thành công'
            ];
        } catch (\Exception $ex) {
            Log::info("update slider failed: " . $ex->getMessage());
        }
    }

    public function deleteSlider($id)
    {
        $slider = $this->image->find($id);
        if (!$slider) return [
            'error' => true,
            'message' => 'Xoá ảnh thất bại'
        ];
        if ($slider->image_link) {
            UploadImage::deleteImage($slider->image_link, $this->image::FILE_UPLOAD_SLIDER);
        }
        $deleteSlider = $slider->delete();
        if (!$deleteSlider) {
            return [
                'error' => true,
                'message' => 'Xoá ảnh thất bại'
            ];
        }

        return [
            'error' => false,
            'message' => 'Xoá ảnh thành công'
        ];
    }

    public function sortSlider(SortSliderRequest $request)
    {
        try {
            DB::beginTransaction();
            $listImage = $request->listImage;
            foreach ($listImage as $item) {
                $this->image->updateOrInsert([
                    'id' => $item['id'],
                ], $item);
            }
            DB::commit();
            return [
                'error' => false,
                'message' => 'Cập nhập vị trí thành công'
            ];
        } catch (\Exception $ex) {
            DB::rollback();
            Log::info("update postion slider failed: " . $ex->getMessage());
            return [
                'error' => true,
                'message' => 'Cập nhập vị trí thất bại'
            ];
        }
    }
}
