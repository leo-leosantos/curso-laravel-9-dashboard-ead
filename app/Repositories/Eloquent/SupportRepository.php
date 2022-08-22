<?php

namespace App\Repositories\Eloquent;

use App\Models\Support as Model;
use App\Repositories\SupportRepositoryInterface;

class SupportRepository implements SupportRepositoryInterface
{
    private $model;


    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getByStatus(string $status): array
    {
        $supports = $this->model->where('status',$status)
                    ->with('user','lesson')
                    ->get();

           //dd($supports);
        return $supports->toArray();
    }
    public function findById(string $id): ?object
    {
        if ($id) {

            return $this->model->find($id);
        }

        return null;
    }
}
