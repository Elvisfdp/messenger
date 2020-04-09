<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conversation;

class ChatPacientesConversationController extends Controller
{
    public function index(){
        return Conversation::where([['user_id', auth()->id()],
        ['level', 4]])->get([
            'id',
            'contact_id',
            'has_blocked',
            'listen_notifications',
            'last_message',
            'last_time',
            'level'
        ]);
    }
}
