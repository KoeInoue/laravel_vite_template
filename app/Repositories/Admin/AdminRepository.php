<?php

namespace App\Repositories\Admin;

use App\Repositories\Admin\AdminRepositoryInterface;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Collection;

class AdminRepository implements AdminRepositoryInterface
{
    public function getAll(): Collection
    {
        return Admin::all();
    }
}
