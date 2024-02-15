<?php

namespace App\Http\Controllers\Client;

use App\Models\Admin\Image;
use Illuminate\Http\Request;
use App\Models\Admin\ConfigLayout;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct(
        protected Image $image,
        protected ConfigLayout $configLayout,
    ) {
    }

    public function index()
    {
        $listSlide = $this->image
            ->where('image_status', $this->image::TYPE_SHOW)
            ->where('image_type', $this->image::TYPE_IMAGE_SLIDER)
            ->orderBy('image_position', 'DESC')
            ->get();
        $listConfigLayout = $this->configLayout
            ->with([
                'posts' => function ($q) {
                    $q->orderBy('id', 'DESC');
                },
                'category' => function ($q) {
                    
                    $q->with(['posts' => function($q1) {
                        $q1->orderBy('id', 'DESC');
                    }]);
                }
            ])
            ->where('config_status', $this->configLayout::CONFIG_SHOW)
            ->orderBy('config_postion', 'DESC')
            ->get();
            
        
        $listSlugConfigLayout = $listConfigLayout->pluck('config_slug')->toArray();
        $listNameConfigLayout = $listConfigLayout->pluck('config_name')->toArray();
        $fullPageItemFirst = $listConfigLayout->first();
        $listTypeAndSlugConfigLayout = $listConfigLayout->map(function ($item) {
            $type = $item->config_type_slide;
            if ($item->config_image) {
                $type = 3;
            }
            return [
                'type' => $type,
                'config_slug' => $item->config_slug,
            ];
        })->toArray();
        return view(
            'client.pages.home',
            [
                'listSlide' => $listSlide,
                'listConfigLayout' => $listConfigLayout,
                'listSlugConfigLayout' => $listSlugConfigLayout,
                'listNameConfigLayout' => $listNameConfigLayout,
                'listTypeAndSlugConfigLayout' => $listTypeAndSlugConfigLayout,
                'fullPageItemFirst' => $fullPageItemFirst
            ]
        );
    }
}
