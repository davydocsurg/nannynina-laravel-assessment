<?php

namespace App\Models;

use App\Models\Scopes\AfricanUsers;
use App\Models\Scopes\OlderUsers;
use App\Models\Scopes\VerifiedUsers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'handle',
        'description',
        'location',
        'age',
        'profile_picture',
        'is_verified',
        'gender',
        'website',
        'password',
    ];

    /**
     * The "booted" method of the model.
     * define all scopes
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new VerifiedUsers);
        static::addGlobalScope(new OlderUsers);
        static::addGlobalScope(new AfricanUsers);
    }

    /**
     * Scope a query to only include users of a particular gender.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $gender
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfGender($query, $gender)
    {
        return $query->where('gender', $gender);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // define a hasMany relationship between users and tweets
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }
}
