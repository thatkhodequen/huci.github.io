<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tinh extends Model
{
    use HasFactory;

    public $timestamps = false ;
    protected $fillable = [
        'name_tinh',
        'type',
        'slug'
    ];
    protected $primaryKey = 'matp';
    protected $table = 'devvn_tinhthanhpho';
}
