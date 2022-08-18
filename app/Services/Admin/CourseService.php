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

}
