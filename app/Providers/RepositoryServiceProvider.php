<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Api\TaskManager\TaskManagerInterface;
use App\Repositories\Api\TaskManager\TaskManagerRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TaskManagerInterface::class, TaskManagerRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
