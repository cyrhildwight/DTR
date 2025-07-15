<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Date extends Model
{
    protected $fillable = [
        'time_in',
        'time_out',
        'user_id'
    ];

    public function user()
    {
    return $this->belongsTo(User::class);
    }
}
