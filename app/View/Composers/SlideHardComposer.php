<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Admin\Post;
use App\Models\Admin\Category;

class SlideHardComposer
{

    public function __construct(
        protected Category $category,
        protected Post $post
    ) {
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categoryCustomer = $this->category->where("category_type", $this->category::CATEGORY_HARD_CUSTOMER)->first();
        $categoryPartner = $this->category->where("category_type", $this->category::CATEGORY_HARD_PARTNER)->first();
        $postCategoryCustomer = $this->post->where("category_id", $categoryCustomer->id)
            ->where("status", $this->post::SHOW_STATUS)
            ->get();
        $postCategoryPartner = $this->post->where("category_id", $categoryPartner->id)
            ->where("status", $this->post::SHOW_STATUS)
            ->get();
        $dataView = [
            'postCategoryCustomer' => $postCategoryCustomer,
            'postCategoryPartner' => $postCategoryPartner
        ];
        $view->with('dataViewSlide', $dataView);
    }
}
