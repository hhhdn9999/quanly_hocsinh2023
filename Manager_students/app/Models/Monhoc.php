<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monhoc extends Model
{
    // use HasFactory;
    public $table = "monhoc";

    public function hocsinh()
    {
        return $this->belongsTo('App\Hocsinh');
    }
}
