<?php

namespace App\Providers\Own;

use App\Services\BookingService;
use App\Services\Impl\BookingServiceImpl;
use Illuminate\Support\ServiceProvider;

class BookingProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BookingService::class, BookingServiceImpl::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
