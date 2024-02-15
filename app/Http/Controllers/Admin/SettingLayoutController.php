<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\ConfigLayout;
use Illuminate\Support\Facades\DB;
use App\Helpers\Facade\UploadImage;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\SortLayoutRequest;
use App\Http\Requests\Admin\Setting\ListPostSettingRequest;
use App\Http\Requests\Admin\Setting\ListProductSettingRequest;
use App\Http\Requests\Admin\Setting\StoreSettingLayoutRequest;
use App\Http\Requests\Admin\Setting\UpdateSettingLayoutRequest;

class SettingLayoutController extends Controller
{
    public function __construct(
        protected ConfigLayout $configLayout,
        protected Category $category,
        protected Post $post
    ) {
    }

    public function index()
    {
        return view('admin.pages.setting.layouts.index');
    }

    public function list(Request $request)
    {
        $listConfigLayout = $this->configLayout
            ->filter($request)
            ->orderBy('config_postion', 'DESC')
            ->get();

        $view = view('admin.pages.setting.layouts.list', [
            'listConfigLayout' => $listConfigLayout
        ])->render();
        return response()->json([
            'error' => false,
            'data' => $view
        ]);
    }

    public function create()
    {
        $listPost = $this->post->where("status", $this->post::SHOW_STATUS)->get();
        $listCategory = $this->category->latest('id')->where("status", $this->category::STATUS_SHOW)->get();
        return view('admin.pages.setting.layouts.create', [
            'listCategory' => $listCategory,
            'listPost' => $listPost
        ]);
    }

    public function listPost(ListPostSettingRequest $request)
    {

        $listPostSelected = $request->listPost;
        $listPost = $this->post->where("category_id", $request->category_id)->where("status", $this->post::SHOW_STATUS)->get();
        $view = view('admin.pages.setting.layouts.list_post', [
            'listPost' => $listPost,
            'listPostSelected' => $listPostSelected
        ])->render();
        return response()->json([
            'error' => false,
            'data' => $view
        ]);
    }

    public function store(StoreSettingLayoutRequest $request)
    {

        try {
            DB::beginTransaction();
            $uploadImage = [
                'error' => true,
                'link' => null
            ];
            if ($request->image) {
                $uploadImage = UploadImage::responseUploadFile($request->image, $this->configLayout::PATH_FILE_UPLOAD);
            }
            $position = $this->configLayout->getPositionLasted();
            $dataInsert = [
                'config_name' => $request->title,
                'config_slug' => Str::slug($request->title),
                'config_type_show' => $request->typeShow,
                'category_id' => $request->typeShow == $this->configLayout::CONFIG_SELECT_CATEGORY ? $request->category : NULL,
                'config_status' => $request->status,
                'config_image' => !$uploadImage['error'] ? $uploadImage['link'] : '',
                'config_postion' => $position,
                'config_type_slide' => $request->typeSlick
            ];
            $insertLayout = $this->configLayout->create($dataInsert);
            if (!$insertLayout) {
                return [
                    'error' => true,
                    'message' => 'Thêm giao diện thất bại'
                ];
            }
            if ($request->typeShow == $this->configLayout::CONFIG_TYPE_SELECT_POST) {
                $insertLayout->posts()->sync($request->listPost);
            }
            DB::commit();
            return [
                'error' => false,
                'message' => 'Thêm giao diện thành công'
            ];
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::info("store setting layout error : " . $ex->getMessage());
            return [
                'error' => true,
                'message' => 'Thêm giao diện thất bại'
            ];
        }
    }

    public function edit($id)
    {
        $layout = $this->configLayout
            ->with([
                'posts' => function ($q) {
                    $q->select("posts.id", "posts.post_title");
                }
            ])
            ->find($id);
        $listPostSelected = $layout->posts ? $layout->posts->pluck("id")->toArray() : [];
        if (!$layout) abort(404);
        $listCategory = $this->category->latest('id')->where("status", $this->category::STATUS_SHOW)->get();
        $listPost = $this->post->where("status", $this->post::SHOW_STATUS)->get();
        return view('admin.pages.setting.layouts.edit', [
            'listCategory' => $listCategory,
            'layout' => $layout,
            'listPostSelected' => $listPostSelected,
            'listPost' => $listPost
        ]);
    }

    public function update(UpdateSettingLayoutRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $layout = $this->configLayout->find($id);
            if (!$layout) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật giao diện thất bại'
                ];
            }
            $uploadImage = [
                'error' => true,
                'link' => null
            ];
            if ($request->image) {
                if ($layout->config_image) {
                    UploadImage::deleteImage($layout->config_image, $this->configLayout::PATH_FILE_UPLOAD);
                }
                $uploadImage = UploadImage::responseUploadFile($request->image, $this->configLayout::PATH_FILE_UPLOAD);
            }

            $dataUpdate = [
                'config_name' => $request->title,
                'config_slug' => Str::slug($request->title),
                'config_type_show' => $request->typeShow,
                'category_id' => $request->typeShow == $this->configLayout::CONFIG_SELECT_CATEGORY ? $request->category : NULL,
                'config_status' => $request->status,
                'config_type_slide' => $request->typeSlick
            ];
            if ($request->isUploadImageNew) {
                $dataUpdate['config_image'] = !$uploadImage['error'] ? $uploadImage['link'] : $layout->config_image;
            }
            if ($request->isDeleteImage != 'false') {
                $dataUpdate['config_image'] = '';
            }

            $updateLayout = $layout->update($dataUpdate);
            if (!$updateLayout) {
                return [
                    'error' => true,
                    'message' => 'Cập nhật giao diện thất bại'
                ];
            }
            if ($request->typeShow == $this->configLayout::CONFIG_TYPE_SELECT_POST) {
                $layout->posts()->sync($request->listPost);
            } else {
                $layout->posts()->detach();
            }
            DB::commit();
            return [
                'error' => false,
                'message' => 'Cập nhật giao diện thành công'
            ];
        } catch (\Exception $ex) {
            DB::rollback();
            Log::info("update layout failed: " . $ex->getMessage());
            return [
                'error' => true,
                'message' => 'Cập nhật giao diện thất bại'
            ];
        }
    }

    public function sort(SortLayoutRequest $request)
    {
        try {
            DB::beginTransaction();
            $listLayout = $request->listLayout;
            foreach ($listLayout as $item) {
                $this->configLayout->updateOrInsert([
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
            Log::info("update postion layout failed: " . $ex->getMessage());
            return [
                'error' => true,
                'message' => 'Cập nhập vị trí thất bại'
            ];
        }
    }

    public function delete($id)
    {
        $layout = $this->configLayout->find($id);
        if (!$layout) {
            return [
                'error' => true,
                'message' => 'Xoá giao diện thất bại'
            ];
        }
        $layout->delete();
        return [
            'error' => false,
            'message' => 'Xoá giao diện thành công'
        ];
    }
}
