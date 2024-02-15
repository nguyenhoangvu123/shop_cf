<?php

namespace App\Providers;

use App\View\Composers\SettingBasic;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\CategoryComposer;
use App\View\Composers\SlideHardComposer;
use App\View\Composers\AccountingComposer;
use App\View\Composers\SettingFooterComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('client.components.nav', CategoryComposer::class);
        View::composer(['client.components.header', 'client.components.nav'], SettingBasic::class);
        View::composer(['client.components.footer', 'client.components.nav'], SettingFooterComposer::class);
        View::composer(['client.components.slick.customer', 'client.components.slick.review_customer', 'client.components.slick.partner'], SlideHardComposer::class);
        View::composer(
            [
                'client.components.accounting',
                'client.components.accounting_page',
            ],
            AccountingComposer::class
        );
    }
}
