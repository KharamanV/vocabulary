<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    /**
     * Get the user hash of current vocabulary
     *
     * @return \Illuminate\Database\Eloquent\Model Relation
     */
    public function userHashes()
    {
        return $this->hasMany('App\Models\UserHash');
    }

    /**
     * Scope a query to only include words with specified id
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
