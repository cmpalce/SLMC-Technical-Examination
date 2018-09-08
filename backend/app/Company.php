<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = false;

    public function storeFromApi($user)
    {
        $this->name = $user->company->name;
        $this->catchPhrase = $user->company->catchPhrase;
        $this->bs = $user->company->bs;
        $this->save();
        return $this;
    }
}
