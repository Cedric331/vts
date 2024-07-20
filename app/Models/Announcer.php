<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'logo',
    ];

    // Relations

    public function mediaPlans(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MediaPlan::class);
    }
}
