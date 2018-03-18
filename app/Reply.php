<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    } 
    public function owner()
    {
        return $this->user();
    } 
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    } 
}
