<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    
    public function user()
    {
        return $this->belongsTo(User::class);
    } 
    public function creator()
    {
        return $this->user();
    } 
    public function replies()
    {
        return $this->hasMany(Reply::class);
    } 
    public function path()
    {
        return '/threads/' . $this->id;
    } 
    
}
