<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

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

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function getNameAttribute($value) //Accessor
    {
        return ucwords($value);
    }
    public function setPasswordAttribute($value) //Mutators
    {
        $this->attributes['password'] = Hash::make($value);
    }
    public function subscribedBlogs()
    {
        return $this->belongsToMany(Blog::class);
    }
    public function isSubscribe($blog)
    {
        return Auth::user()->subscribedBlogs && Auth::user()->subscribedBlogs->contains('id',$blog->id);
    }
}
