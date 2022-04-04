<?php

namespace App\Repositories\Admin;

use Illuminate\Database\Eloquent\Collection;

interface AdminRepositoryInterface
{
    public function getAll(): Collection;
}
