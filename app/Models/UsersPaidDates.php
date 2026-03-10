<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersPaidDates extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'paid_date',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
