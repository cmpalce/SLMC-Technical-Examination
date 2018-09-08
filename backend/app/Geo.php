<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geo extends Model
{
    protected $table = 'geo';

    public $timestamps = false;

    public function storeFromApi($user)
    {
        $this->lat = $user->address->geo->lat;
        $this->lng = $user->address->geo->lng;
        $this->save();
        return $this;
    }
}
