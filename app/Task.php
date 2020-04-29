<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'creator_id', 'status_id', 'tag_id', 'executor_id'];

    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\TaskComment', 'task_id');
    }

    public function status()
    {
        return $this->belongsTo('App\TaskStatus');
    }

    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
}
