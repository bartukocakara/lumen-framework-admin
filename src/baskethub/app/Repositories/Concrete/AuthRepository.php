<?php

namespace App\Repositories\Concrete;

use App\Models\User;
use App\Repositories\Abstracts\IAuthRepository;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\WelcomeCustomer;
use App\Traits\UserProperty;
use App\Helpers\Coupon\WelcomeCoupon;
use App\Helpers\Auth\Password;
use Illuminate\Support\Facades\Auth;

class AuthRepository extends BaseRepository implements IAuthRepository
{
    use ApiResponse, UserProperty;

    protected $jwt;

    /**
     * JWTAuthController constructor.
     * @param JWTAuth $jwt
     */
    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public function register($request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->first_name = $request->last_name;
        $user->last_name =  $request->email;
        $user->birthday = isset($request->birthday) ? date_format(date_create(str_replace('/','-', $request["birthday"])), "Y-m-d" ) : null;
        $user->save();
        $credentials = $request->only('email', 'password');
        $token = $this->guard()->attempt($credentials);
        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithTokenCreateUser($token);
        }
        return $this->badRequestResponse();
    }

    private function guard()
    {
        return Auth::guard();
    }

    public function registerConfirm($request)
    {
        $validator = $this->registerConfirmValidate($request);
        if ($validator->fails()) {
            return $validator->messages();
        }

        return $this->createCustomer($request);
    }

    public function login($request)
    {
        $credentials = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }
        return $this->badRequestResponse();

    }

    public function refreshToken()
    {
        $newToken = auth()->refresh(true, true);
        return $this->respondWithToken($newToken);
    }

    public function logout()
    {
        auth()->logout(true);
        return ['message'=>'Token removed'] ;
    }

}
