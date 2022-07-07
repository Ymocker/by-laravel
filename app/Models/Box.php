<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $table = 'box';
    public $timestamps = false;

    public function candy()
    {
        return $this->hasMany('App\Models\Candy');
    }

}
