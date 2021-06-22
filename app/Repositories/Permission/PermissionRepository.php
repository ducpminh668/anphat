<?php

namespace App\Repositories\Permission;

use App\Repositories\EloquentRepository;

class PermissionRepository extends EloquentRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Permission::class;
    }
}
