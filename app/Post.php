<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'comments'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function post()
    {
        $this->belongsTo(Task::class);
    }

    public function getDiffAttribute()
    {
        Carbon::setLocale('es');

        $difference = $this->created_at->diffForHumans();
        return $difference;
    }
}
