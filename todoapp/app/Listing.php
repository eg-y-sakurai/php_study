<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    //リレーション
    public function cards()
    {
        return $this->hasMany('App\Card');
    }
}
