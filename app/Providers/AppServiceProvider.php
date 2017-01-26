<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\User\User;
use App\Domain\User\UserRepository;
use App\Infrastructure\User\DoctrineUserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, function($app) {
            // This is what Doctrine's EntityRepository needs in its constructor.
            return new DoctrineUserRepository(
                $app['em'],
                $app['em']->getClassMetaData(User::class)
            );
        });
    }
}
