<?php

namespace App\Repositories\Concrete;

use App\Models\CustomerAddress;
use App\Repositories\Abstracts\IAddressRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Traits\DateTimeTrait;

class PlayerRepository extends BaseRepository implements IAddressRepository
{
    use ApiResponse, DateTimeTrait;

    public function list()
    {

    }

    public function show($id)
    {

    }


    public function create($request)
    {

    }


    private function putListCache($customerId)
    {

    }

    public function update($request, $id)
    {

    }

    public function delete($id)
    {

    }

}
