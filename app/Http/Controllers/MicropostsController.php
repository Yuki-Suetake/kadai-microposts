<?php

namespace App\Http\Controller;

use Illuminate\Http\Request;

class MicropostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'microposts' => $microposts,
            ];
        }
        
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->microposts()->create([
            'content' => $request->content,
        ]);

        return back();
    }
    
    public function destroy($id)
    {
        $micropost = \App\Micropost::find($id);
        // 削除を実行する部分はif文で囲む
        // 他社のMicrosoftを勝手に削除されないよう、ログインユーザのIDとMicropostの所有者のID(user_id)が一致しているかを調べるようにしている
        if (\Auth::id() === $micropost->user_id) {
            $micropost->delete();
        }

        return back();
    }
}