<?php

namespace App\Models;

use App\Observers\MediaPlanObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([MediaPlanObserver::class])]
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
        'end_date_wish',
        'end_date',
        'end_date_flexibility',
        'campaign_id',
        'announcer_id',
        'created_by',
        'updated_by',
    ];

    // Objective
    const OBJECTIVE_SALE = 1;

    const OBJECTIVE_PROSPECTING = 2;

    const OBJECTIVE_TRAFFIC_WEBSITE = 3;

    const OBJECTIVE_AWARENESS = 4;

    const OBJECTIVE_PROMOTION_STORE = 5;

    const OBJECTIVE_PROMOTION_APP = 6;

    const OBJECTIVE_OTHER = 7;

    // Periodicity
    const PERIODICITY_PONCTUAL = 'Ponctuel';

    const PERIODICITY_RECURRENT = 'Récurrent';

    // Date wish
    const DATE_WISH_ASAP = 1;

    const DATE_WISH_SPECIFIC = 2;

    const DATE_WISH_INCERTAIN = 3;

    // Date flexibility
    const DATE_FLEXIBILITY_STRICT = 1;

    const DATE_FLEXIBILITY_FLEXIBLE = 2;

    const DATE_FLEXIBILITY_VERY_FLEXIBLE = 3;

    // Relations
    public function campaign(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function announcer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Announcer::class);
    }

    public function messages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Message::class);
    }

    // Accessors & Mutators
    /**
     * @return void
     *              Définir le budget en centimes
     */
    public function setBudgetAttribute($value): void
    {
        $this->attributes['budget'] = $value * 100;
    }

    /**
     * @return float|int
     *                   Récupére le budget en euros (float)
     */
    public function getBudgetAttribute($value): float|int
    {
        return $value / 100;
    }
}
