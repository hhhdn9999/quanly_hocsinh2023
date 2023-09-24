<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    // use HasFactory;
    public $table = "lop";
    public function post()
    {
        return $this->hasMany('App\Models\Post', 'lop_id');
    }
}
