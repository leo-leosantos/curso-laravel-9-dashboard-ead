<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

class UserService
{
    private $repository;
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }



    public function getAll(string $filter = ''): array
    {

        $users = $this->repository->getAll($filter);

        return convertItemsOfArrayToObject($users) ;
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
