<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = ['username','transaction_id' ,'amount', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
}
