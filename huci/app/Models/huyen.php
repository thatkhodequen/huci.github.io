<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class huyen extends Model
{
    use HasFactory;

    public $timestamps = false ;
    protected $fillable = [
        'name_huyen',
        'type',
        'matp'
    ];
    protected $primaryKey = 'maqh';
    protected $table = 'devvn_quanhuyen';
}
