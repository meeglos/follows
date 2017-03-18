<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Jenssegers\Date\Date;

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
        return $this->belongsToMany(Tag::class);
    }

   public function posts()
    {
        return $this->hasMany(Post::class);
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
        return $this->created_at->diffForHumans();
    }

    public function getTooltipAttribute()
    {
        return '<span class="tt-main">' . $this->description . '</span><hr class="dotted">' .
                '<br><span class="tt-main tt-title">Persona contacto: </span><span class="tt-main tt-details">' . $this->client_name . '</span>' .
                '<br><span class="tt-main tt-title">Teléfono contacto: </span><span class="tt-main tt-details">' . $this->client_phone . '</span>' .
                '<br><span class="tt-main tt-title">Registrado el: </span><span class="tt-main tt-details">' . $this->full_fecha . '</span>';
    }
    public function getFechaAttribute()
    {
        Carbon::setLocale('es');
        return $this->created_at->diffForHumans();
    }
    public function getFullFechaAttribute()
    {
        Carbon::setLocale('es');
        return $this->created_at->format('d.m.Y') . ' a las ' . $this->created_at->format('H:i:s');
    }

    public function getStatusAttribute()
    {
        if ($this->pending)
            return '<h6 class="label label-danger tag-bg">Pendiente</h6>';
        else
            return '<h6 class="label label-success tag-bg">Finalizado</h6>';
    }
}
