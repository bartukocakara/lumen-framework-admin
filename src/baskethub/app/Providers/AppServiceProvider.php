<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Abstracts\IAuthRepository;
use App\Repositories\Concrete\AuthRepository;
use App\Services\Abstracts\IAuthService;
use App\Services\Concrete\AuthService;
use App\Repositories\Abstracts\IPasswordRepository;
use App\Repositories\Concrete\PasswordRepository;
use App\Services\Abstracts\IPasswordService;
use App\Services\Concrete\PasswordService;
use App\Repositories\Abstracts\IPlayerRepository;
use App\Repositories\Concrete\PlayerRepository;
use App\Services\Abstracts\IPlayerService;
use App\Services\Concrete\PlayerService;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAuthService::class, AuthService::class);
        $this->app->bind(IAuthRepository::class, AuthRepository::class);
        $this->app->bind(IPasswordService::class, PasswordService::class);
        $this->app->bind(IPasswordRepository::class, PasswordRepository::class);
        $this->app->bind(IPlayerService::class, PlayerService::class);
        $this->app->bind(IPlayerRepository::class, PlayerRepository::class);
    }
}
