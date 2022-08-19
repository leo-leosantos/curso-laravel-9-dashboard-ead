<?php

namespace App\Services\Admin;

use App\Repositories\CourseRepositoryInterface;

class CourseService
{
    private $repository;
    public function __construct(CourseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(string $filter = ''): array
    {

        $courses = $this->repository->getAll($filter);

        return convertItemsOfArrayToObject($courses);
    }

    public function create(array $data): object
    {
        return $this->repository->create($data);
    }

    public function findById(string $id): ?object
    {
        if ($id) {
            return $this->repository->findById($id);
        }

        return null;
    }


    public function update(string $id, array $data): ?object
    {
        if ($id) {
            return $this->repository->update($id, $data);
        }
        return null;
    }

    public function delete(string $id): bool
    {
        return $this->repository->delete($id);
    }
}
