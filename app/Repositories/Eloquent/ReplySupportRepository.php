<?php

namespace App\Repositories\Eloquent;

use App\Models\ReplaySupport as Model;
use App\Repositories\ReplySupportRepositoryInterface;

class ReplySupportRepository implements ReplySupportRepositoryInterface
{
    private $model;


    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function createReplyToSupport(array $data)
    {
        return  $this->model->create($data);
    }

}
