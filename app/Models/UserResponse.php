<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResponse extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'response1', 'response2', 'response3', 'response4', 'response5', 'response6', 'response7', 'response8'];
}
