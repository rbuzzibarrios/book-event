<?php

namespace App\Providers;

use App\Repositories\Concretes\ActivityRepository;
use App\Repositories\Concretes\BookingRepository;
use App\Repositories\Concretes\SharedRepository;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use App\Repositories\Interfaces\BookingRepositoryInterface;
use App\Repositories\Interfaces\SharedRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(SharedRepositoryInterface::class, SharedRepository::class);
        $this->app->bind(ActivityRepositoryInterface::class, ActivityRepository::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
    }

    public function boot()
    {
    }
}