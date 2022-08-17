<?php

namespace App\Repositories\Eloquent;

use App\Models\Admin as Model;
use App\Repositories\AdminRepositoryInterface;

class AdminRepository implements AdminRepositoryInterface
{
    private $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll(string $filter = ''): array
    {
        $Admins = $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('email', $filter);
                    $query->orWhere('name', 'LIKE', "%{$filter}%");
                }
            })
            ->get();

        return $Admins->toArray();
    }
    public function findById(string $id) : object
    {
        if ($id) {
            return $this->model->find($id);
        }

        return null;
    }
    public function create(array $data): object
    {
        return $this->model->create($data);
    }
    public function update(string $id, array $data): object
    {

        if (!$Admin = $this->findById($id)) {
            return null;
        }
        $Admin->update($data);

        return $Admin;
    }
    public function delete(string $id): bool
    {
        if (!$Admin = $this->findById($id)) {
            return false;
        }

        return  $Admin->delete();
    }
}
