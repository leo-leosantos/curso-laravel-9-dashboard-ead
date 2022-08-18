<?php

namespace App\Repositories\Eloquent;

use App\Models\Course as Model;
use App\Repositories\CourseRepositoryInterface;

class CourseRepository implements CourseRepositoryInterface
{
    private $model;


    public function __construct(Model $model)
    {
        $this->model = $model;


    }

    public function getAll(string $filter = ''): ?array
    {
        $courses = $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('email', $filter);
                    $query->orWhere('name', 'LIKE', "%{$filter}%");
                }
            })
            ->get();

        return $courses->toArray();
    }
    public function findById(string $id): ?object
    {

        if ($id) {

            return $this->model->find($id);

        }

        return null;
    }
    public function create(array $data): ?object
    {
        return $this->model->create($data);
    }
    public function update(string $id, array $data): object
    {

        if (!$courses = $this->findById($id)) {
            return null;
        }
        $courses->update($data);

        return $courses;
    }
    public function delete(string $id): ?bool
    {
        if (!$courses = $this->findById($id)) {
            return false;
        }

        return  $courses->delete();
    }
}
