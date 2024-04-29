<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FriendsListController extends Controller
{
    public function get()
    {
        $user = Auth::user();
        $userId = $user->id;
        $userName = $user->name;
        $friendIds = Friend::where('user_id', $userId)->pluck('friend_id');

        $friends = [];
        foreach ($friendIds as $friendId){
            $friend = User::select('name', 'id')->where('id', $friendId)->first();
            $friends[] = ['id' => $friend->id, 'name' => $friend->name];
        }

        return Inertia::render('FriendList', [
            'userName' => $userName,
            'friends' => $friends,
        ]);
    }
}
