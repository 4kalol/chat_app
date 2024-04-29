<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Exception;

class ApiController extends Controller
{
    public function store(Request $request)
    {
        try {
            $message = new Message();
            $message->sender_id = $request->userId;
            $message->receiver_id = $request->friendId;
            $message->content = $request->message;
            $message->save();

            return true;
        } catch(Exception $e) {
            throw $e;
        }
    }
}
