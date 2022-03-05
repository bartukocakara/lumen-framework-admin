<?php

namespace App\Http\Controllers;

use App\Services\Abstracts\IAuthService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponse;


class AuthController extends Controller
{
    use ApiResponse;

    /**
     * @var IAuthService
     */
    private IAuthService $service;

    /**
     * MobileInitController constructor.
     * @param IInitService $initService
     */
    public function __construct(IAuthService $authService)
    {
        $this->service = $authService;
    }

    /**
     * @OA\POST(
     *     path="/api/v1/auth/login",
     *     summary="Login Customer",
     *     description="Login Customer",
     *     tags={"Auth"},
     *     @OA\Parameter(
     *          name="email",
     *          description="Customer e-mail address",
     *          required=true,
     *          example="deneme123@gmail.com",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="password",
     *          description="Password",
     *          required=true,
     *          example=123456,
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="basket_token",
     *          description="Basket Token",
     *          example="AY9XUFgCUGO3l44LtrZ7inj1642520212",
     *          in="query"
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Login Customer"),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *     )
     * )
     */
    public function login(Request $request)
    {
        try {
            return $this->service->login($request);
        } catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }


    /**
     * @OA\POST(
     *     path="/api/v1/auth/register",
     *     summary="Register Customer",
     *     description="Register Customer",
     *     tags={"Auth"},
     *     @OA\Parameter(
     *          name="email",
     *          description="Customer e-mail address",
     *          required=true,
     *          example="deneme123@gmail.com",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="password",
     *          description="Password",
     *          required=true,
     *          example=123456,
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="first_name",
     *          description="First name",
     *          required=true,
     *          example="lidFirstName",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="last_name",
     *          description="Last name",
     *          required=true,
     *          example="lidLastName",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="birthday",
     *          description="Birthday",
     *          required=false,
     *          example="01/01/2022",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="wants_news",
     *          description="Wants News(0 or 1)",
     *          required=false,
     *          example=1,
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="basket_token",
     *          description="Basket Token",
     *          required=false,
     *          example="b6IK74nD3dJjUU9fzTuFnZc1643123452",
     *          in="query"
     *     ),
     *     @OA\Response(
     *          response="201",
     *          description="Created"),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *     )
     * )
     */
    public function register(Request $request)
    {
        return $this->service->register($request);
    }

   /**
     * @OA\POST(
     *     path="/api/v1/auth/guest-register",
     *     summary="Guest Register Customer",
     *     description="Guest Register Customer",
     *     tags={"Auth"},
     *     @OA\Parameter(
     *          name="email",
     *          description="Customer e-mail address",
     *          required=true,
     *          example="deneme123@gmail.com",
     *          in="query"
     *     ),
     *     @OA\Response(
     *          response="201",
     *          description="Created"),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *     )
     * )
     */
    public function guestRegister(Request $request)
    {
        return $this->service->guestRegister($request);
    }

    public function registerConfirm(Request $request)
    {
        try {
            return $this->createdResponse($this->service->registerConfirm($request));
        } catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }

    /**
     * @OA\POST(
     *     path="/api/v1/customers/logout",
     *     summary="Logout Customer",
     *     tags={"Auth"},
     *     description="Logout Customer",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *          response="200",
     *          description="Logout Customer"),
     *     @OA\Response(
     *          response=404,
     *          description="Wrong Request"
     *     )
     * )
     */

    public function logout() : object
    {
        try {
            return $this->okResponse($this->service->logout());
        } catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }

    /**
     * @OA\GET(
     *     path="/api/v1/refresh-token",
     *     summary="Refresh Token",
     *     security={{"bearerAuth":{}}},
     *     tags={"Auth"},
     *     description="Refresh Token",
     *     @OA\Response(
     *          response="200",
     *          description="Refresh Token"),
     *     @OA\Response(
     *          response=404,
     *          description="Wrong Request"
     *     ),
     * )
     */
    public function refreshToken()
    {
        try {
            return $this->service->refreshToken();
        } catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }

    /**
     * @OA\PATCH(
     *     path="/api/v1/customers/update-password",
     *     summary="Update Customer Password",
     *     description="Update Customer Password",
     *     security={{"bearerAuth":{}}},
     *     tags={"Customer"},
     *     @OA\Parameter(
     *          name="password",
     *          description="Password",
     *          required=true,
     *          example="123456",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="new_password",
     *          description="New Password",
     *          required=true,
     *          example="123456new",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="new_password_confirmation",
     *          description="New Password Confirm",
     *          required=true,
     *          example="123456new",
     *          in="query"
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Customer Password updated successfully"),
     *     @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *     ),
     *     @OA\Response(
     *          response=403,
     *          description="Forbidden Request"
     *     )
     * )
     */
    public function updatePassword(Request $request)
    {
        return $this->service->updatePassword($request);
    }
}
