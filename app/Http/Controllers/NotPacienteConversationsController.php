<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conversation;
use App\User;

class NotPacienteConversationsController extends Controller
{
    public function index(){
        $AllUsers = array();
        $ContactUsers =array();
        $NewUsers =array();
        
        $AllUsers=User::where('level',4)->get()->toArray();
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
