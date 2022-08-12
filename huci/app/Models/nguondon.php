<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nguondon extends Model
{
    use HasFactory;
    
    public $timestamps = false ;
    protected $fillable = [
        'tennguondon',
        'nhomnguon_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'nguondon';

    public function donhang(){
        return $this->hasMany('App\Models\donhang','nguondon_id','id');
    }
    
}
