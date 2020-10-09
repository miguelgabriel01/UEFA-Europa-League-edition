<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Players extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','nationality','age','position','description','email','number',
    ];

    protected static function booted(){

        
        //quando a img for exibida
        static::retrieved(function(Players $player){
            Log::channel('stderr')->info('RETRIEVED..  ' .$player->id);//o id do player recuperado
        });
        //quando começa a salvar...
        static::creating(function(Players $player){
            Log::channel('stderr')->info('CREATING..  ' .$player->title);//titulo do player que está sendo criado
        });
        //QUANDO O player FOR CRIADO
        static::created(function(Players $player){
            Log::channel('stderr')->info('CREATED..  ' .$player->id);//id do player já criado
        });
        

        //evento para deletar o player com a img
        static::deleting(function(Players $player){
            Log::channel('stderr')->info('Evento playerDeletado..  ' .$player->image);
            Storage::disk('public')->delete($player->image);
        });


    }

     //função de acesso ao usuario
     public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function image(){
        return $this->hasOne('App\Models\Image');
    }
}
