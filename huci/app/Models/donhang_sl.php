<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang_sl extends Model
{
    use HasFactory;

    public $timestamps = false ;

    protected $fillable = [
        'soluong',
    ];
    protected $primaryKey = 'donhang_id,sanpham_id';
    protected $table = 'donhang_sls';

}
