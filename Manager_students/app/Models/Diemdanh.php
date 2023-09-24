<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diemdanh extends Model
{
    public $table = "diemdanh";
    use HasFactory;

    public function hocsinh()
    {
        return $this->belongsTo('App\Hocsinh');
    }
}
