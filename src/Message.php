<?php

declare(strict_types=1);

namespace GeneaLabs\LaravelMessenger;

use Illuminate\Support\Str;
use Jenssegers\Model\Model;

class Message extends Model
{
    protected $appends = [
        "id",
        'autoHide',
        'framework',
        'message',
        'level',
        'title',
        'type',
    ];
    protected $casts = [
        'autoHide' => 'boolean',
    ];
    protected $fillable = [
        "id",
        'autoHide',
        'framework',
        'message',
        'level',
        'title',
        'type',
    ];

    public function getIdAttribute(): string
    {
         $this->attributes["id"] = $this->attributes["id"]
             ?? Str::random(16);

        return $this->attributes["id"];
    }

    public function getAutoHideAttribute(): bool
    {
        return ($this->attributes['autoHide'] === true);
    }

    public function getFrameworkAttribute(): string
    {
        return $this->attributes['framework']
            ?: config('genealabs-laravel-messenger.framework');
    }

    public function getMessageAttribute(): string
    {
        return $this->attributes['message'] ?: '';
    }

    public function getLevelAttribute(): string
    {
        return $this->attributes['level'] ?: 'info';
    }

    public function getTitleAttribute(): string
    {
        return $this->attributes['title'] ?: '';
    }

    public function getTypeAttribute(): string
    {
        return $this->attributes['type'] ?: 'alert';
    }
}
