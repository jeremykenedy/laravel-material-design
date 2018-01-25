<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'completed',
    ];

    /**
     * Bind the Task to a User.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
