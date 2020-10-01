<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','nationality','age','position','description','email','number',
    ];

     //função de acesso ao usuario
     public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
