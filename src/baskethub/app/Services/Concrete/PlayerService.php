<?php

namespace App\Services\Concrete;

use App\Repositories\Abstracts\IPlayerRepository;
use App\Services\Abstracts\IPlayerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class PlayerService implements IPlayerService
{
    /**
     * @var IPlayerRepository
     */
    private IPlayerRepository $repository;

    /**
     * PlayerService constructor.
     * @param IPlayerRepository $playerRepository
     */
    public function __construct(IPlayerRepository $playerRepository)
    {
        $this->repository = $playerRepository;
    }

    public function list()
    {
        return $this->repository->list();
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function create($request)
    {
        return $this->repository->create($request);
    }

    public function update($request, $id)
    {
        return $this->repository->update($request, $id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);

    }

}
