<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotifyCurrentPlan extends Model
{
    use HasFactory;

    public const DEFAULT_PLAN = [
        'name' => 'Family Plan',
        'amount' => 10.49,
    ];

    protected $fillable = [
        'name',
        'amount',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    // Scopes

    public function scopeLatest($query)
    {
        return $query->latest()->first();
    }
}
