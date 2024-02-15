<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Admin\Setting;
use App\Models\Admin\Category;

class SettingFooterComposer
{

    public function __construct(
        protected Category $category,
        protected Setting $setting
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
        $itemCategory = $this->category
            ->select("id", "category_name", "category_slug")
            ->where("position_show", $this->category::POSITION_SHOW_FOOTER)
            ->where("status", $this->category::STATUS_SHOW)
            ->first();
        $listSettingBasic = $this->setting
            ->where("key", $this->setting::KEY_SETTING_BASIC)
            ->select("value")->first();
        $data = (object) [
            'itemCategory' =>  $itemCategory,
            'listSettingBasic' => $listSettingBasic
        ];
        $view->with('listSettingFooter', $data);
    }
}
