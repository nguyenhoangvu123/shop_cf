<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Admin\Setting;

class SettingBasic
{

    public function __construct(protected Setting $setting)
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
        $listSettingBasic = $this->setting
                ->where("key", $this->setting::KEY_SETTING_BASIC)
                ->select("value")->first();
        $view->with('listSettingBasic', $listSettingBasic);
    }
}
