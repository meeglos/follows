<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function post(Task $task, $comment)
    {
        $post = new Post([
           'comments'   => $comment,
            'task_id'   => $task->id,
        ]);
        $this->posts()->save($post);
    }
}
