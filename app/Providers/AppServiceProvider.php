<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Laravel\Dusk\DuskServiceProvider;

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
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
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
            'QuestionRepositoryInterface' => 'QuestionRepository',
            'AnswerRepositoryInterface' => 'AnswerRepository',
            'CommentRepositoryInterface' => 'CommentRepository',
            'TestQuestionRepositoryInterface' => 'TestQuestionRepository',
            'HomeAdminRepositoryInterface' => 'HomeAdminRepository',
            'HistoryRepositoryInterface' => 'HistoryRepository',
        ];
        foreach ($repositories as $key => $val) {
            $this->app->bind("App\\Repositories\\Contracts\\$key", "App\\Repositories\\Eloquents\\$val");
        }
    }
}
