<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HashAlgorithm extends Model
{
    /**
     * Get the user hashes of this algorithm
     *
     * @return \Illuminate\Database\Eloquent\Model Relation
     */
    public function userHashes()
    {
        return $this->hasMany('App\Models\UserHash');
    }

    /**
     * Scope a query to only include algorithm with specified id
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeId($query, $id) 
    {
        return $query->where('id', $id);
    }
}
