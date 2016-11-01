<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip', 'browser', 'country'
    ];

    /**
     * Get the user hash of current user
     *
     * @return \Illuminate\Database\Eloquent\Model Relation
     */
    public function userHashes()
    {
        return $this->hasMany('App\Models\UserHash');
    }

    /**
     * Scope a query to only include user with specified ip
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $ip
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIp($query, $ip)
    {
        return $query->where('ip', $ip);
    }
}
