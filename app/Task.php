<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function creator()
    {
        return $this->belongsTo('App\User');
    }
}
