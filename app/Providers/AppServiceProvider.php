<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as LaravelPaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Model::preventLazyLoading();
        // LaravelPaginator::useBootstrap();

        // commented out because gate was replaced with policy
        // Gate::define('edit-post', function (User $user, Post $post) {
        //     return $post->author->user->is($user);
        // });
    }
}
