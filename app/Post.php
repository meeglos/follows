<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'comments', 'user_id', 'task_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function getDiffAttribute()
    {
        Carbon::setLocale('es');

        $difference = $this->created_at->diffForHumans();
        return $difference;
    }
}
