<?php

namespace App\Repositories\Eloquent;

use App\Models\Module as Model;
use App\Repositories\ModuleRepositoryInterface;

class ModuleRepository implements ModuleRepositoryInterface
{
    private $model;


    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAllByCourseId(string $CourseId,  string $filter = ''): ?array
    {
        $modules = $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->orWhere('name', 'LIKE', "%{$filter}%");
                }
            })
            ->where('course_id', $CourseId)
            ->get();

        return $modules->toArray();
    }
    public function findById(string $id): ?object
    {
        if ($id) {

            return $this->model->find($id);
        }

        return null;
    }
    public function createByCourse(string $CourseId, array $data): ?object
    {
        $data['course_id'] = $CourseId;

        return $this->model->create($data);
    }

    public function update(string $id, array $data): object
    {

        if (!$itemDb = $this->findById($id)) {
            return null;
        }

        $itemDb->update($data);

        return $itemDb;
    }
    public function delete(string $id): ?bool
    {
        if (!$modules = $this->findById($id)) {
            return false;
        }

        return  $modules->delete();
    }
}
