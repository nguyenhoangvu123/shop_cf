<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Helpers\Facade\UploadImage;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\StoreSettingBasicRequest;
use App\Http\Requests\Admin\Setting\StoreSettingIntroduceRequest;

class SettingController extends Controller
{

    public function __construct(protected Setting $setting)
    {
    }

    public function listSettingBasic()
    {
        $listSettingBasic = $this->setting
            ->where("key", $this->setting::KEY_SETTING_BASIC)
            ->select("value")->first();
        return view('admin.pages.setting.index', [
            'listSettingBasic' => $listSettingBasic
        ]);
    }

    public function storeSettingBasic(StoreSettingBasicRequest $request)
    {
        try {
            $listSettingBasic = $this->setting
                ->where("key", $this->setting::KEY_SETTING_BASIC)
                ->select("value")->first();
            $listUpdate = $request->all();
            $uploadImage = [
                'error' => true,
                'link' => null
            ];
            if ($request->logo) {
                if (!empty($listSettingBasic->value->logo)) {
                    UploadImage::deleteImage($listSettingBasic->value->logo, $this->setting::PATH_FILE_UPLOAD);
                }
                $uploadImage = UploadImage::responseUploadFile($request->logo, $this->setting::PATH_FILE_UPLOAD);
            }
            if ($request->isUploadImageNew) {
                $listUpdate['logo'] = !$uploadImage['error'] ? $uploadImage['link'] : $listSettingBasic->value->logo;
            }
            if ($request->isDeleteImage != 'false') {
                $listUpdate['logo'] = $listSettingBasic->value->logo;
            }
            $listDataInsert = json_encode($listUpdate, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE);
            $insertDataSettingBasic = $this->setting->updateOrInsert([
                'key' => $this->setting::KEY_SETTING_BASIC
            ], ['value' => $listDataInsert]);
            if (!$insertDataSettingBasic) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật cấu hình thông tin cơ bản thất bại'
                ];
            }
            return [
                'error' => false,
                'message' => 'Cập nhật cấu hình thông tin cơ bản thành công'
            ];
        } catch (\Exception $ex) {
            Log::info('store setting basic error: ' . $ex->getMessage());
            return [
                'error' => true,
                'message' => 'Cập nhật cấu hình thông tin cơ bản thất bại'
            ];
        }
    }

    public function indexSettingIntroduce()
    {
        $listSettingIntroduce = $this->setting
            ->where("key", $this->setting::KEY_SETTING_INTRODUCE)
            ->select("value")->first();
        return view('admin.pages.setting.introduce.index', [
            'listSettingIntroduce' => $listSettingIntroduce
        ]);
    }

    public function storeSettingIntroduce(StoreSettingIntroduceRequest $request)
    {
        try {
            $listDataInsert = json_encode($request->all(), JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE);
            $insertDataSettingIntroduce = $this->setting->updateOrInsert([
                'key' => $this->setting::KEY_SETTING_INTRODUCE
            ], ['value' => $listDataInsert]);
            if (!$insertDataSettingIntroduce) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật cấu hình thông tin giới thiệu thất bại'
                ];
            }
            return [
                'error' => false,
                'message' => 'Cập nhật cấu hình thông tin giới thiệu thành công'
            ];
        } catch (\Exception $ex) {
            Log::info('store setting introduce error: ' . $ex->getMessage());
            return [
                'error' => true,
                'message' => 'Cập nhật cấu hình thông tin giới thiệu thất bại'
            ];
        }
    }

    public function indexSettingContact()
    {
        $listSettingIntroduce = $this->setting
            ->where("key", $this->setting::KEY_SETTING_CONTACT)
            ->select("value")->first();
        return view('admin.pages.setting.contact.index', [
            'listSettingContact' => $listSettingIntroduce
        ]);
    }

    public function storeSettingContact(StoreSettingIntroduceRequest $request)
    {
        try {
            $listDataInsert = json_encode($request->all(), JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE);
            $insertDataSettingIntroduce = $this->setting->updateOrInsert([
                'key' => $this->setting::KEY_SETTING_CONTACT
            ], ['value' => $listDataInsert]);
            if (!$insertDataSettingIntroduce) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật cấu hình thông tin liên hệ thất bại'
                ];
            }
            return [
                'error' => false,
                'message' => 'Cập nhật cấu hình thông tin liên hệ thành công'
            ];
        } catch (\Exception $ex) {
            Log::info('store setting introduce error: ' . $ex->getMessage());
            return [
                'error' => true,
                'message' => 'Cập nhật cấu hình thông tin liên hệ thất bại'
            ];
        }
    }
}
