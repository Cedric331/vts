<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaPlan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'objective',
        'periodicity',
        'periodicity_one',
        'budget',
        'start_date_wish',
        'start_date',
        'start_date_flexibility',
        'end_date',
        'end_date_flexibility',
        'campaign_id',
        'announcer_id',
        'created_by',
        'updated_by',
    ];

    // Relations
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function announcer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Announcer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Message::class);
    }

    // Accessors & Mutators
    /**
     * @param $value
     * @return void
     * Définir le budget en centimes
     */
    public function setBudgetAttribute($value): void
    {
        $this->attributes['budget'] = $value * 100;
    }

    /**
     * @param $value
     * @return float|int
     * Récupérer le budget en euros (float)
     */
    public function getBudgetAttribute($value): float|int
    {
        return $value / 100;
    }
}
