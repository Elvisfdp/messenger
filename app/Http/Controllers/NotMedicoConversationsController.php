<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conversation;
use App\User;

class NotMedicoConversationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $AllUsers = array();
        $ContactUsers =array();
        $NewUsers =array();
        $id_user = auth()->id();
        
        $AllUsers=User::where([
            ['level', '=', 2],
            ['id', '<>', $id_user]
        ])->get()->toArray();
        $ContactUsers=User::consulta();
        $newContactUsers = array();
        $NewAllUsers =array();
        $array3 = array();
        $newContactUsers = count($ContactUsers, COUNT_NORMAL);
        $NewAllUsers = count($AllUsers,COUNT_NORMAL);
        for ($i=0; $i < $NewAllUsers; $i++) {
            if (!in_array($AllUsers[$i], $ContactUsers)) { 
                array_push($array3,$AllUsers[$i]);
            }
        }
        
        return $array3;
    }
}
