<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $fillable = ['nickname', 'email', 'password', 'name', 'lastname', 'birthday'];

    public function tasks()
    {
        return $this->hasMany('App\Task', 'creator_id');
    }

    public function taskComments()
    {
        return $this->hasMany('App\TaskComment', 'creator_id');
    }
}
