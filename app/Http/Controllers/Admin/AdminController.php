<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\AdminService;

class AdminController extends Controller
{
    /**
     * Constructar
     *
     * @param AdminService $adminService
     **/
    public function __construct(
        protected AdminService $adminService,
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
    public function index()
    {
        $admins = $this->adminService->getAllAdmins();

        return view();
    }
}
