<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Thread
 *
 * @package App
 * @author  James Wallen-Jones <j.wallen.jones@googlemail.com>
 */
class Thread extends Model
{
    use SoftDeletes;

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    /**
     * @return Message|null
     */
    public function getLastMessageAttribute(): ?Message
    {
        return $this->messages()->orderBy('created_at', 'DESC')->first();
    }
}
