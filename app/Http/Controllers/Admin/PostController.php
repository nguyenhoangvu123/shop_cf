<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Helpers\Facade\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StorePostRequest;

class PostController extends Controller
{

    public function __construct(
        protected Post $post,
        protected Category $category
    ) {
    }

    public function index()
    {
        $listCategory = $this->category->latest('id')->where("status", $this->category::STATUS_SHOW)->get();
        return view('admin.pages.posts.index', [
            'listCategory' => $listCategory
        ]);
    }

    public function list(Request $request)
    {
        $listPost = $this->post->filter($request)->latest('id')->paginate(LIMIT_PAGE, ['*'], 'page', $request->page);
        $view = view('admin.pages.posts.list', [
            'listPost' => $listPost
        ])->render();
        return response()->json([
            'error' => false,
            'data' => $view
        ]);
    }

    public function create()
    {
        $listCategory = $this->category->latest('id')->where("status", $this->category::STATUS_SHOW)->get();
        return view('admin.pages.posts.create', [
            'listCategory' => $listCategory
        ]);
    }

    public function edit($id)
    {
        $post = $this->post->find($id);
        if (!$post) abort(404);
        $listCategory = $this->category->latest('id')->where("status", $this->category::STATUS_SHOW)->get();
        return view('admin.pages.posts.edit', [
            'listCategory' => $listCategory,
            'post' => $post
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $uploadImage = [
            'error' => true,
            'link' => null
        ];
        if ($request->image) {
            $uploadImage = UploadImage::responseUploadFile($request->image, $this->post::PATH_FILE_UPLOAD);
        }
        $dataInsert = [
            'post_title' => $request->title,
            'post_slug' => Str::slug($request->title),
            'status' => $request->status,
            'post_image' => !$uploadImage['error'] ? $uploadImage['link'] : '',
            'post_description' => $request->description,
            'category_id' => $request->category,
            'post_sub_title' => $request->subTitle
        ];
        $insertPost = $this->post->create($dataInsert);
        if (!$insertPost) {
            return [
                'error' => true,
                'message' => 'Tạo bài viết thất bại'
            ];
        }
        return [
            'error' => false,
            'message' => 'Tạo bài viết thành công'
        ];
    }

    public function update(StorePostRequest $request, $id)
    {
        $post = $this->post->find($id);
        if (!$post) return [
            'error' => true,
            'message' => 'Cập nhật bài viết thất bại'
        ];
        $uploadImage = [
            'error' => true,
            'link' => null
        ];
        if ($request->image) {
            if ($post->post_image) {
                UploadImage::deleteImage($post->post_image, $this->post::PATH_FILE_UPLOAD);
            }
            $uploadImage = UploadImage::responseUploadFile($request->image, $this->post::PATH_FILE_UPLOAD);
        }
        $dataUpdate = [
            'post_title' => $request->title,
            'post_slug' => Str::slug($request->title),
            'status' => $request->status,
            'post_description' => $request->description,
            'category_id' => $request->category,
            'post_sub_title' => $request->subTitle
        ];
        if ($request->isUploadImageNew) {
            $dataUpdate['post_image'] = !$uploadImage['error'] ? $uploadImage['link'] : $post->post_image;
        }
        if ($request->isDeleteImage != 'false') {
            $dataUpdate['post_image'] = '';
        }
        $updatePost = $post->update($dataUpdate);
        if (!$updatePost) {
            return [
                'error' => true,
                'message' => 'Cập nhật bài viết thất bại'
            ];
        }
        return [
            'error' => false,
            'message' => 'Cập nhật bài viết thành công'
        ];
    }

    public function delete($id)
    {
        $post = $this->post->find($id);
        if (!$post) return [
            'error' => true,
            'message' => 'Xoá bài viết thất bại'
        ];
        if ($post->post_image) {
            UploadImage::deleteImage($post->post_image, $this->post::PATH_FILE_UPLOAD);
        }
        $post->comments()->delete();
        $post->delete();
        return [
            'error' => false,
            'message' => 'Xoá bài viết thành công'
        ];
    }
}
