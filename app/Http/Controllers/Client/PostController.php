<?php

namespace App\Http\Controllers\Client;

use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\ConfigLayout;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Post\ListPostCategoryRequest;

class PostController extends Controller
{
    public function __construct(
        protected Post $post,
        protected Category $category,
        protected ConfigLayout $configLayout

    ) {
    }

    public function index($slug_category, $slug_post)
    {

        $idPost = $this->getIdPost($slug_post);
        $itemCategory = $this->category->where("category_slug", $slug_category)->first();
        if (!$itemCategory) {
            return abort(404);
        }
        $post = $this->post->where("category_id", $itemCategory->id)->find($idPost);
        if (!$post) {
            return abort(404);
        }
        $listPostRelations = $post
        ->where("category_id", $itemCategory->id)
        ->where("id", "<>" , $post->id)
        ->orderBy('id', 'DESC')
        ->paginate(LIMIT_PAGE_CLINET_POST);
        return view("client.pages.post", [
            'itemCategory' => $itemCategory,
            'post' => $post,
            'idPost' => $post->id,
            'postTitle' => $post->post_title,
            'listPostRelations' => $listPostRelations
        ]);
    }

    public function listPostOfCategory(ListPostCategoryRequest $request)
    {
        $itemSlick = $request->itemSlick;
        $idCategory = $request->id_list;
        $typeSlick = $request->typeSlick;
        $listPost = $this->post->where("category_id", $idCategory)
            ->where("status", $this->post::SHOW_STATUS)
            ->get();
        $view = view('client.components.posts.list_post_limit', [
            'listPost' => $listPost,
            'itemSlick' => $itemSlick,
            'typeSlick' => $typeSlick
        ])->render();
        return response()->json($view);
    }


    public function getIdPost($postSlug)
    {
        $parts = collect(explode('-', $postSlug));
        $id = $parts->last();
        return $id;
    }
}
