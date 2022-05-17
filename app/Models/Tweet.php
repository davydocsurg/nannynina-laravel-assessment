<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    // return the user of a particular tweet
    public function tweep()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
