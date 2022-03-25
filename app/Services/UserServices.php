<?php

namespace App\Services;

use App\Models\User;

class UserServices
{
    public function getAll()
    {
        return User::paginate(10);
    }
    public function find($id)
    {
        return User::find($id);
    }
    public function createOrUpdate($data)
    {
        $upSet = [
          'email'=>$data['email']
        ];
        if(isset($data['password']) && !is_null( $data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }elseif(is_null($data['password'])){
            unset($data['password']);
        }

        $user = User::updateOrCreate($upSet, $data);
        return $user;
    }

    public function destroy($id){
        $user = User::find($id)->delete();
    }
}
