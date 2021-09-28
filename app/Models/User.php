<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    public static $snakeAttributes = false;

    protected $dates = [
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function interests()
    {
        return $this->hasMany(Interest::class);
    }

    public function languages()
    {
        return $this->hasMany(Language::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function socialMedia()
    {
        return $this->hasMany(SocialMedia::class);
    }

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class);
    }
}
