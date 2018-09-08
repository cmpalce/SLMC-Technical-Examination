<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;

    public function geo()
    {
        return $this->hasOne('App\Geo', 'id', 'geoId');
    }

    public function storeFromApi($user, $geoId)
    {
        $this->geoId = $geoId;
        $this->street = $user->address->street;
        $this->suite = $user->address->suite;
        $this->city = $user->address->city;
        $this->zipcode = $user->address->zipcode;
        $this->save();
        return $this;
    }
}
