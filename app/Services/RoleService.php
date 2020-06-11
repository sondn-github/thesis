<?php


namespace App\Services;


use App\Role;
use App\Services\Interfaces\RoleServiceInterface;

class RoleService extends Service implements RoleServiceInterface
{
    public function getRoles() {
        return Role::all();
    }
}
