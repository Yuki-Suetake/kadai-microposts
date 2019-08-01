<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{

    protected $fillable = ['content', 'user_id', 'micropost_id'];

    public function user()
    {
    return $this->belongsTo(User::class);
    }
    
// -------------------------------------------------------------------
    
    public function favorite_users() // added
    {
    return $this->belongsToMany(Micropost::class); // added
    }
}
