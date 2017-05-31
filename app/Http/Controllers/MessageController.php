<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create(StoreMessageRequest $request)
    {
        $message = new Message();
        $message->thread_id = $request->get('thread_id');
        $message->user_id = Auth::user()->id;
        $message->content = $request->get('content');
        $message->save();

        // dispatch event to say a message has been sent
    }
}
