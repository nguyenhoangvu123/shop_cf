<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Admin\Category;

class CategoryComposer
{

    public function __construct(protected Category $category)
    {
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $listCategory = $this->category
            ->select("id", "category_name", "category_slug")
            ->where("position_show", $this->category::POSITION_SHOW_MENU)
            ->where("status", $this->category::STATUS_SHOW)
            ->get();
        $view->with('listCategory', $listCategory);
    }
}
