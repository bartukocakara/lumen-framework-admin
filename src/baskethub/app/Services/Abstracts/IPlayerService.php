<?php

namespace App\Services\Abstracts;

use Illuminate\Http\Request;

interface IPlayerService
{
    public function list();

    public function show($id);

    public function create($request);

    public function update($request, $id);

    public function delete($id);
}
