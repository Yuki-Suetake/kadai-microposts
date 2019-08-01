<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function counts($user) {
        $count_microposts = $user->microposts()->count();
        $count_followings = $user->followings()->count(); // 追加
        $count_followers = $user->followers()->count(); // 追加
// ---------------------------------------------------------------
        $count_favorites = $user->favorites()->count(); // added

        return [
            'count_microposts' => $count_microposts,
            'count_followings' => $count_followings, // 追加
            'count_followers' => $count_followers, // 追加
// ----------------------------------------------------------------
            'count_favorites' => $count_favorites, // added
        ];
    }
}