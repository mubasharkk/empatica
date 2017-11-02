<?php
namespace App\Services\MobileApp;

final class Service
{
    /**
     * @var Repository
     */
    private $repository;

    /**
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function listAll()
    {
        return $this->repository->fetchAll();
    }

    /**
     * @param string $appId
     * @param int $userId
     * @return int
     */
    public function createNewApp($appId, $status, $userId)
    {
        return $this->repository->add($appId, $status, $userId);
    }

    public function deleteApp($appId)
    {
        $this->repository->delete($appId);
    }
}