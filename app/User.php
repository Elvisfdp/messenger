<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    function scopeConsulta ($query){
        $query->Select('users.*')
        ->join('conversations','conversations.contact_id','users.id')
        ->where('conversations.user_id','=',auth()->id());
        $data = $query->get()->toArray();
        return $data;
    }
    
    
}
