<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'firstSurname',
        'secondSurname',
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
        'password' => 'hashed',
        'isPremium' => 'boolean',
    ];

    /**
     * Relaciones del modelo User
     */

    public function groups()
    {
        return $this->belongsToMany(Group::class)
            ->withTimestamps();
    }

    public function dailyReward()
    {
        return $this->hasOne(DailyReward::class);
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class)
            ->withTimestamps();
    }

    public function bets()
    {
        return $this->belongsToMany(Bet::class, 'bet_user')
            ->withTimestamps();
    }

    public function challenges()
    {
        return $this->belongsToMany(Challenge::class, 'team_user_challenge')
            ->withTimestamps();
    }

    public function createdBets()
    {
        return $this->hasMany(Bet::class, 'creator_id');
    }

    public function options()
    {
        return $this->belongsToMany(Option::class)
            ->withTimestamps();
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
