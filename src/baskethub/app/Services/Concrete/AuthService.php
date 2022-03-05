<?php

namespace App\Services\Concrete;

use App\Repositories\Abstracts\IAuthRepository;
use App\Services\Abstracts\IAuthService;
use Illuminate\Http\Request;

class AuthService implements IAuthService
{
    /**
     * @var IAuthRepository
     */
    private IAuthRepository $repository;

    /**
     * AuthService constructor.
     * @param IAuthRepository $authRepository
     */
    public function __construct(IAuthRepository $authRepository)
    {
        $this->repository = $authRepository;
    }

    /**
     * @return string
     */
    public function register($request)
    {
        return $this->repository->register($request);
    }

    public function guestRegister($request)
    {
        return $this->repository->guestRegister($request);
    }

    public function registerConfirm($request)
    {
        return $this->repository->registerConfirm($request);
    }

    public function login($request)
    {
        return $this->repository->login($request);
    }

    public function me()
    {
        return $this->repository->me();
    }

    public function refreshToken()
    {
        return $this->repository->refreshToken();
    }

    public function logout()
    {
        return $this->repository->logout();
    }

    public function updatePassword($request)
    {
        return $this->repository->updatePassword($request);
    }
}
