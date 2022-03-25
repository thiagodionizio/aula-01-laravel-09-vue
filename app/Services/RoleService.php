<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    public function getAll()
    {
        return Role::all();
    }
    public function find($id)
    {
        return Role::find($id);
    }
    public function create($data)
    {
        $role = Role::create($data);
        return $role;
    }
    public function update($id, $data)
    {
        $role = Role::find($id)->update($data);
        return $role;
    }

    public function destroy($id){
        Role::find($id)->delete();
    }
}
