<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khohang extends Model
{
    use HasFactory;

    public $timestamps = false ;
    protected $fillable = [
        'tenkhohang'
    ];
    protected $primaryKey = 'id';
    protected $table = 'khohang';
}
