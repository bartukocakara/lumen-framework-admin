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
        $user->save();
        $credentials = $request->only('email', 'password');
        $token = $this->guard()->attempt($credentials);
        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithTokenCreateUser($token);
        }
        return response()->json(['error' => 'login_error'], 401);
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

    public function registerConfirmValidate($request)
    {
        $data = $request->only("first_name", "last_name", "email", "password", "password_confirmation", "birthday", "wants_news");
        $validator = Validator::make($data, [
            'first_name' => 'required|string|min:2|max:50',
            'last_name' => 'required|string|min:2|max:50',
            'email' => 'required|email:rfc,dns|unique:customers',
            'password' => 'required|string|min:6|max:50|confirmed',
            'password_confirmation' => 'required|string|min:6|max:50',
            'birthday' => 'nullable|date',
        ]);

        return $validator;
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
