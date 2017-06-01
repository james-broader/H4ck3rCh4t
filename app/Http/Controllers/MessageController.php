<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function send(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|unique:users,name',
            'room_id' => 'required|integer|exists:rooms,id',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $input = $request->all();

        $msg = new Message;

        $msg->text = $input['text'];
        $msg->room_id = intval($input['room_id']);
        $msg->user_id = intval($input['user_id']);

        $msg->save();

        return 200;
    }

    public function get($id)
    {
        $msgs = Message::where('room_id', '=', intval($id))->get();

        return $msgs;
    }
}
