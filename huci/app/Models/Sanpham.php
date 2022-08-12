<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;

    public $timestamps = false ;
    protected $fillable = [
        'tensanpham',
        'tenvietgon',
        'trongluong',
        'giagoc',
        'giasanpham'
    ];
    protected $primaryKey = 'id';
    protected $table = 'sanpham';

    public function donhang(){
        return $this->belongsToMany('App\Models\donhang','donhang_sls','sanpham_id','donhang_id');
    }
}
