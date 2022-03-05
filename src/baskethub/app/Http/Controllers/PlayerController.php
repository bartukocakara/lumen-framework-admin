<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Abstracts\IPlayerService;
use App\Traits\ApiResponse;

class PlayerController extends Controller
{
    use ApiResponse;

    /**
     * @var IPlayerService
     */
    private IPlayerService $service;

    /**
     * MobileInitController constructor.
     * @param IInitService $initService
     */
    public function __construct(IPlayerService $PlayerService)
    {
        $this->service = $PlayerService;
    }

    /**
     * @OA\GET(
     *     path="/api/v1/customers/players",
     *     summary="Get Player List",
     *     description="Get Player List",
     *     security={{"bearerAuth":{}}},
     *     tags={"Customer"},
     *     @OA\Response(
     *          response=200,
     *          description="OK"),
     *     @OA\Response(
     *          response=400,
     *          description="Bad Request"),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized")
     * )
     */
    public function list()
    {
        try {
            return $this->okResponse($this->service->list());
        }
        catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }

    /**
     * @OA\GET(
     *     path="/api/v1/customers/players/{playerId}",
     *     summary="Get Player Data",
     *     description="Get Player Data",
     *     security={{"bearerAuth":{}}},
     *     tags={"Customer"},
     *     @OA\Parameter(
     *          name="playerId",
     *          description="Player Id",
     *          required=true,
     *          example=5,
     *          in="path"
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="OK"),
     *     @OA\Response(
     *          response=400,
     *          description="Bad Request"),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized")
     * )
     */
    public function show($id)
    {
        try {
            return $this->okResponse($this->service->show($id));
        }
        catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }

    /**
     * @OA\POST(
     *     path="/api/v1/customers/players",
     *     summary="Create Player Data",
     *     description="Create Player Data",
     *     tags={"Customer"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="alias",
     *          description="Player Title",
     *          required=true,
     *          example="12",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="contact_firstname",
     *          description="Contact First Name",
     *          required=true,
     *          example="Contact Firstname",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="contact_lastname",
     *          description="Contact Last Name",
     *          required=true,
     *          example="Contact Lastname",
     *          in="query"
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="OK"),
     *     @OA\Response(
     *          response=400,
     *          description="Bad Request"),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized")
     * )
     */
    public function create(Request $request)
    {
        return $this->service->create($request);
    }


    /**
     * @OA\PATCH(
     *     path="/api/v1/customers/players/{playerId}",
     *     summary="Update Player Data",
     *     description="Update Player Data",
     *     tags={"Customer"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="playerId",
     *          description="Player Id",
     *          required=true,
     *          example="12",
     *          in="path"
     *     ),
     *     @OA\Parameter(
     *          name="alias",
     *          description="Player Title",
     *          required=true,
     *          example="Title",
     *          in="query"
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="OK"),
     *     @OA\Response(
     *          response=400,
     *          description="Bad Request"),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized")
     * )
     */
    public function update(Request $request, $id)
    {
        try {
            return $this->service->update($request, $id);
        } catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }

    /**
     * @OA\DELETE(
     *     path="/api/v1/customers/players/{playerId}",
     *     summary="Delete Player Data",
     *     description="Delete Player Data",
     *     tags={"Customer"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="playerId",
     *          description="Player Id",
     *          required=true,
     *          example="4",
     *          in="path"
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Player Data deleted successfully"),
     *     @OA\Response(
     *          response=404,
     *          description="Bad Request"),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized")
     * )
     */
    public function delete($id)
    {
        try {
            return $this->okResponse($this->service->delete($id));
        } catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }
}
