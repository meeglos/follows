<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class)->withTimestamps();
    }

    public function getDifAttribute()
    {
        Carbon::setLocale('es');
        $difference = $this->created_at->diffForHumans();
        return $difference;
    }
    public function getCountAttribute()
    {
        $total = $this->tasks()->count();

        return ($total > 0 ? $total : 'Sin llamadas.');

    }
}
