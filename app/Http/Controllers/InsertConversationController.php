<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conversation;
use App\User;

class InsertConversationController extends Controller
{
    public function store(Request $request){
        $user_id = '';
        $contact_id = '';
        $level = '';
        $status = '';
        $user_id = $request->user_id;
        $contact_id = $request->contact_id;
        $level = $request->level;
        $level_user = User::select('level')->where('id',$user_id)->get();
        $level_user =$level_user[0]['level'];
       
        if($user_id !=null && $contact_id !=null){
            $conversation = new Conversation;
            $conversation->user_id = $user_id;
            $conversation->contact_id = $contact_id;
            $conversation->level = $level;
            $conversation->save();

            $conversation1= new Conversation;
            $conversation1->user_id =$contact_id;
            $conversation1->contact_id = $user_id;
            $conversation1->level = $level_user;
            $conversation1->save();
            $status ='OK';
        }else {
            $status ='ERROR';
        }
        return $status;
    }
}
