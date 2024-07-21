<?php

namespace Database\Factories;

use App\Models\MediaPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=MediaPlan>
 */
class MediaPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $periodicity = $this->faker->randomElement([
            MediaPlan::PERIODICITY_PONCTUAL,
            MediaPlan::PERIODICITY_RECURRENT
        ]);

        $start_date_wish = $this->faker->randomElement([
            MediaPlan::DATE_WISH_ASAP,
            MediaPlan::DATE_WISH_SPECIFIC,
            MediaPlan::DATE_WISH_INCERTAIN
        ]);

        $end_date_wish = $this->faker->randomElement([
            MediaPlan::DATE_WISH_ASAP,
            MediaPlan::DATE_WISH_SPECIFIC,
            MediaPlan::DATE_WISH_INCERTAIN
        ]);

        $announcer = \App\Models\Announcer::all()->random();

        return [
            'name' => $announcer->name . ' - ' . $this->faker->date('Y-m-d', 'now'),
            'objective' => $this->faker->randomElement([
                MediaPlan::OBJECTIVE_SALE,
                MediaPlan::OBJECTIVE_PROSPECTING,
                MediaPlan::OBJECTIVE_TRAFFIC_WEBSITE,
                MediaPlan::OBJECTIVE_AWARENESS,
                MediaPlan::OBJECTIVE_PROMOTION_STORE,
                MediaPlan::OBJECTIVE_PROMOTION_APP,
                MediaPlan::OBJECTIVE_OTHER
            ]),
            'periodicity' => $periodicity,
            'periodicity_one' => $periodicity === MediaPlan::PERIODICITY_PONCTUAL ? null : $this->faker->numberBetween(1, 100),
            'budget' => $this->faker->numberBetween(1, 100),
            'start_date_wish' => $start_date_wish,
            'start_date' => $start_date_wish === MediaPlan::DATE_WISH_SPECIFIC ? $this->faker->dateTimeBetween('now', '+1 month') : null,
            'start_date_flexibility' => $this->faker->randomElement([
                MediaPlan::DATE_FLEXIBILITY_STRICT,
                MediaPlan::DATE_FLEXIBILITY_FLEXIBLE,
                MediaPlan::DATE_FLEXIBILITY_VERY_FLEXIBLE
            ]),
            'end_date_wish' => $end_date_wish,
            'end_date' => $end_date_wish === MediaPlan::DATE_WISH_SPECIFIC ? $this->faker->dateTimeBetween('+1 month', '+2 month') : null,
            'end_date_flexibility' => $this->faker->randomElement([
                MediaPlan::DATE_FLEXIBILITY_STRICT,
                MediaPlan::DATE_FLEXIBILITY_FLEXIBLE,
                MediaPlan::DATE_FLEXIBILITY_VERY_FLEXIBLE
            ]),
            'campaign_id' => \App\Models\Campaign::all()->random()->id,
            'announcer_id' => $announcer->id,
            'created_by' => \App\Models\User::all()->random()->id,
        ];
    }
}
