<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $fillable = [
        'firstName', 'lastName', 'username', 'email', 'password', 'referral_code', 'upline', 'gender', 'role'
    ];

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'username', 'username');
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class, 'username', 'username');
    }

    public function commissions()
    {
        return $this->hasMany(Commission::class, 'username', 'username');
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
