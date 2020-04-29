<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskTag extends Model
{
    public function task()
    {
        return $this->hasMany('App\Task', 'tag_id');
    }
}
