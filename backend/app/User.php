<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;

    public function address()
    {
        return $this->hasOne('App\Address', 'id', 'addressId');
    }

    public function company()
    {
        return $this->hasOne('App\Company', 'id', 'companyId');
    }

    public function storeFromApi($user, $addressId, $companyId)
    {
        $this->id = $user->id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->website = $user->website;
        $this->addressId = $addressId;
        $this->companyId = $companyId;
        $this->save();
        return $this;
    }
}
