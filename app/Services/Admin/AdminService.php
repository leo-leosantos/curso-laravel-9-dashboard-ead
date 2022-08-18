<?php

namespace App\Services\Admin;

use App\Repositories\AdminRepositoryInterface;

class AdminService
{
    private $repository;
    public function __construct(AdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }



    public function getAll(string $filter = ''): array
    {

        $admins = $this->repository->getAll($filter);

        return convertItemsOfArrayToObject($admins);
    }
    public function findById(string $id): object
    {
        if ($id) {
            return $this->repository->findById($id);
        }

        return null;
    }
    public function create(array $data): object
    {
        return $this->repository->create($data);
    }
    public function update(string $id, array $data): object
    {
        if ($id) {
            return $this->repository->update($id, $data);
        }
        return null;
    }
    public function delete(string $id): bool
    {
        if ($id) {
            return $this->repository->delete($id);
        }
        return null;
    }
}
