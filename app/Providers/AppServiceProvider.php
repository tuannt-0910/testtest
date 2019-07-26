<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $repositories = [
            'UserRepositoryInterface' => 'UserRepository',
            'FileRepositoryInterface' => 'FileRepository',
            'CategoryRepositoryInterface' => 'CategoryRepository',
            'TestRepositoryInterface' => 'TestRepository',
        ];
        foreach ($repositories as $key => $val){
            $this->app->bind("App\\Repositories\\Contracts\\$key", "App\\Repositories\\Eloquents\\$val");
        }
    }
}
