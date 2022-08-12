<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    use HasFactory;

    public $timestamps = false ;
    protected $fillable = [
        'tuship',
        'si',
        'hotenkhach',
        'sdt',
        'diachi',
        'tinhtrangda',
        'ghichubd',
        'ghichuct',
        'thanhtien',
        'chuyenkhoan',
        'tiencuoc',
        'ngaygui',
        'ngaynhap',
        'chiachietkhau_id',
        'phiship_id',
        'nhapdonhang_id',
        'tinhtrang_id',
        'nguondon_id',
    ];
    protected $primaryKey = 'id';
    protected $table = 'donhang';

    public function tinhtrang(){
        return $this->belongsTo('App\Models\tinhtrang','tinhtrang_id','id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','chiachietkhau_id','id');
    }
    public function user1(){
        return $this->belongsTo('App\Models\User','nhapdonhang_id','id');
    }
    public function phiship(){
        return $this->belongsTo('App\Models\phiship','phiship_id','id');
    }
    public function nguondon(){
        return $this->belongsTo('App\Models\nguondon','nguondon_id','id');
    }
    public function sanpham(){
        return $this->belongsToMany('App\Models\sanpham','donhang_sls','donhang_id','sanpham_id')->withPivot('soluong');
    }
}
