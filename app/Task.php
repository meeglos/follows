<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
    protected $fillable = [
        'agent_code',
        'client_code',
        'client_name',
        'client_phone',
        'client_name',
        'client_phone',
        'description',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = $value;

        $this->attributes['slug'] = Str::slug($value);
    }
    public function getTagListAttribute()
    {
        return $this->tags->pluck('id')->toArray();
    }

    public function getUrlAttribute()
    {
        return route('tasks.show', [$this->id, $this->slug]);
    }

    public function getDifAttribute()
    {
        Carbon::setLocale('es');
        $difference = $this->created_at->diffForHumans();
        return $difference;
    }

    public function getTooltipAttribute()
    {
        return '<span class="follow-author">' . $this->description . '</span> <br><u>Persona contacto</u>: ' . $this->client_name . ' <br>  <u>Teléfono contacto</u>:  ' . $this->client_phone;
    }
}
