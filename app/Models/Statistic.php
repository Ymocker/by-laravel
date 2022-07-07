<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $table = 'statistic';
    protected $primaryKey = 'name_id';
    protected $keyType = 'string';
    public $timestamps = false;
    public $incrementing = false;
}
