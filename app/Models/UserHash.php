<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHash extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'hash_algorithm_id', 'vocabulary_id', 'hash'
    ];

    /**
     * Get the user of current record
     *
     * @return \Illuminate\Database\Eloquent\Model Relation
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the algorithm of current record
     *
     * @return \Illuminate\Database\Eloquent\Model Relation
     */
    public function hashAlgorithm()
    {
        return $this->belongsTo('App\Models\HashAlgorithm');
    }

    /**
     * Get the word of current record
     *
     * @return \Illuminate\Database\Eloquent\Model Relation
     */
    public function vocabulary()
    {
        return $this->belongsTo('App\Models\Vocabulary');
    }

    /**
     * Scope a query to only include user hash with specified id
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserId($query, $id)
    {
        return $query->where('user_id', $id);
    }
}
