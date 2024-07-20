<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status',
        'user_d',
    ];

    // Status
    const STATUS_PENDING = 1;

    const STATUS_ACTIVE = 2;

    const STATUS_INACTIVE = 3;

    // Relations

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mediaPlans(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MediaPlan::class);
    }
}
