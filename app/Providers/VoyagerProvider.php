<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;

class VoyagerProvider extends ServiceProvider
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
        Voyager::addAction(\App\Actions\AllQrGenerate::class);
        Voyager::addAction(\App\Actions\QrGenerate::class);
        Voyager::addAction(\App\Actions\ReSendMail::class);
        Voyager::addAction(\App\Actions\ToggleApproved::class);
        Voyager::addAction(\App\Actions\UsersExport::class);    
    }
}
