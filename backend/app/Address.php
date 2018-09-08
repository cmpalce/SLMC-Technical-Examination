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
}
