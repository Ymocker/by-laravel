<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candy extends Model
{
    protected $table = 'candy';
    public $timestamps = false;

    public function box()
    {
        return $this->belongsTo('App\Models\Box');
    }
}
