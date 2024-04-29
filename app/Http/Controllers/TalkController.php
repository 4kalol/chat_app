<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Ramsey\Uuid\Type\Integer;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TalkController extends Controller
{
    public function get(Request $request)
    {
        // ログイン中のユーザIDを取得
        $userId = Auth::user()->id;

        // 選択した友達のfriend_idとnameを取得
        $friendId = intVal($request->friend_id);
        $friendName = User::where('id', $friendId)->first()->name;

        // friend_idのトーク情報をソートして取得
        $messages = Message::whereIn('sender_id', [$userId, $friendId])
                            ->whereIn('receiver_id', [$userId, $friendId])
                            ->orderBy('created_at')
                            ->get();

        return Inertia::render('Talk', [
            'userId'     => $userId,
            'friendId'   => $friendId,
            'friendName' => $friendName,
            'messages'   => $messages,
        ]);
    }
}
