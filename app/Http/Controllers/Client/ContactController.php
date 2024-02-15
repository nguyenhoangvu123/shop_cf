<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Models\Admin\ConfigLayout;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function __construct(
        protected Setting $setting,
        protected ConfigLayout $configLayout
    ) {
    }

    public function index()
    {
        $contact = $this->setting->where("key", $this->setting::KEY_SETTING_CONTACT)->first();
        return view("client.pages.contact", [
            "contact" => $contact
        ]);
    }
}
