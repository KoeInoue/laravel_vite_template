<?php

namespace App\Services\Admin;

use App\Repositories\Admin\AdminRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AdminService
{
    /**
     * Constructar
     *
     * @param AdminService $adminService
     **/
    public function __construct(
        protected AdminRepositoryInterface $adminRepo,
    ) {
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function getAllAdmins(): Collection
    {
        return $this->adminRepo->getAll();
    }
}
