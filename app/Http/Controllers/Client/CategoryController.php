<?php

namespace App\Http\Controllers\Client;

use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\ConfigLayout;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct(
        protected Category $category,
        protected Post $post,
        protected ConfigLayout $configLayout,
    ) {
    }

    public function childrent($slug_category, $slug_category_childrent)
    {



        $itemCategory = $this->category->where('category_slug', $slug_category_childrent)
            ->whereRaw('parent_id = (SELECT id FROM categories where category_slug = ? limit 1 )', [$slug_category])
            ->first();
        if (!$itemCategory) {
            return abort(404);
        }

        $listPost = $this->post
        ->where("category_id", $itemCategory->id)
        ->orderBy('id', 'DESC')
        ->paginate(LIMIT_PAGE_CLINET);
        return view('client.pages.category_child', [
            'itemCategory' => $itemCategory,
            'listPost' => $listPost,
        ]);
    }

    public function parent($slug_category)
    {
        $listPost = null;
        $itemCategory = $this->category
            ->where('category_slug', $slug_category)
            ->with([
                'childrens' => function ($query1) {
                    $query1->where('status', Category::STATUS_SHOW);
                    $query1->with([
                        'posts' => function ($query2) {
                            $query2->where('status', Post::SHOW_STATUS);
                            $query2->orderBy('id', 'DESC');
                        }
                    ]);
                }
            ])
            ->first();
        if (!$itemCategory) {
            return abort(404);
        }
       
        if ($itemCategory->childrens->count() <= 0) {
            $listPost = $this->post->where("category_id", $itemCategory->id)->paginate(LIMIT_PAGE_CLINET);
        }
        return view('client.pages.category', [
            'itemCategory' => $itemCategory,
            'listPost' => $listPost
        ]);
    }
}
