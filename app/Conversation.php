<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $appends = ['contact_name','last_name','level'];

    public function getContactNameAttribute(){
        return $this->contact()->first(['name'])->name;
    }

    public function getLastNameAttribute(){
        return $this->contact()->first(['lastName'])->lastName;
    }

    public function getLevelAttribute(){
        return $this->contact()->first(['level'])->level;
    }

    public function contact(){
        //COnversation N  1 User (contact)
        return $this->belongsTo(User::class);
    }
}
