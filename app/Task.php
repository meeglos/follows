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
        return $this->created_at->diffForHumans();
    }

    public function getTooltipAttribute()
    {
        return $this->description .
                '<br><span class="follow-author">Persona contacto: </span>' . $this->client_name .
                '<br><span class="follow-author">Teléfono contacto: </span>' . $this->client_phone .
                '<br><span class="follow-author">Registrado el: </span>' . $this->full_fecha;
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
            return '<h6 class="label tag-bg tag-bg-ko">Pendiente</h6>';
        else
            return '<h6 class="label tag-bg tag-bg-ok">Finalizado</h6>';
    }
}
