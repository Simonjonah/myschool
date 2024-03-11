<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'schoolname'
            ]
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'user_id',
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function queries(){
        return $this->hasMany(Query::class);
    }
    
    public function teacherassigns(): HasMany 
    {
        return $this->hasMany(Teacherassign::class);
    }

    public function results(): HasMany 
    {
        return $this->hasMany(Result::class);
    }

    public function transactions(): HasMany 
    {
        return $this->hasMany(Transaction::class);
    }

    public function lessonnotes(): HasMany 
    {
        return $this->hasMany(Lessonnote::class);
    }

    public function teachers(): HasMany 
    {
        return $this->hasMany(Teacher::class);
    }

    public function classnames(): HasMany 
    {
        return $this->hasMany(Classname::class);
    }
    public function subjects(): HasMany 
    {
        return $this->hasMany(Classname::class);
    }

    public function domains(): HasMany 
    {
        return $this->hasMany(Domain::class);
    }

    public function blogs(): HasMany 
    {
        return $this->hasMany(Blog::class);
    }

    public function schoolnews(): HasMany 
    {
        return $this->hasMany(Schoolnew::class);
    }
    
    
}
