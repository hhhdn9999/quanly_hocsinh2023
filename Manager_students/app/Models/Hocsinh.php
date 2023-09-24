<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hocsinh extends Model
{
    protected $primaryKey = "hocsinh_id";
    // use HasFactory;
    public $table = "hocsinh";
    protected $fillable = ['hocsinh_id', 'hocsinh_name', 'sobuoihoc_somonhoc','hocsinh_image','lop_id','hocsinh_image'];
    public function lop()
    {
        return $this->belongsTo(Lop::class, 'id');
    }
    public function diemdanhs()
    {
        return $this->hasMany('App\Diemdanh');
    }
    public function monhocs()
    {
        return $this->hasMany('App\Hocsinh');
    }
}
