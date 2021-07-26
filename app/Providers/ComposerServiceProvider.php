<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
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
    
        View::composer(
            [
                'backend.layouts.master',
                'backend.layouts.front_master',
                'backend.partial.leftsidebar',
                'backend.user.login',
                'backend.user.forgot',
                'backend.user.reset',
                'backend.user.lock',
                'backend.settings.crm'
            ],
            'App\Http\ViewComposers\BackendMasterComposer'
        );
    }
}
