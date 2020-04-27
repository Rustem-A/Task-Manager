<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function tasks()
    {
        return $this->hasMany('App\Task', 'creator_id');
    }

    public function taskComments()
    {
        return $this->hasMany('App\TaskComment', 'creator_id');
    }
}
