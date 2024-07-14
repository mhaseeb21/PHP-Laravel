<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'referral_username', 'commission_amount'];

    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }

    public function referralUser()
    {
        return $this->belongsTo(User::class, 'referral_username', 'username');
    }
}
