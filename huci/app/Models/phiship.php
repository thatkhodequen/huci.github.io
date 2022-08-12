<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phiship extends Model
{
    use HasFactory;

    public $timestamps = false ;
    protected $fillable = [
        'tenphiship',
        'giatri'
    ];
    protected $primaryKey = 'id';
    protected $table = 'phiship';
}
