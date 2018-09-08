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
}
