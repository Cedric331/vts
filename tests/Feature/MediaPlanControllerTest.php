<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\MediaPlan;
use App\Models\User;
use App\Models\Campaign;
use App\Models\Announcer;

class MediaPlanControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test store method
     *
     * @return void
     */
    public function testStoreMediaPlan()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $campaign = Campaign::factory()->create();
        $announcer = Announcer::factory()->create();

        $data = [
            'name' => 'Test Media Plan',
            'objective' => 1,
            'periodicity' => 'Récurrent',
            'periodicity_one' => 20,
            'budget' => 1000,
            'start_date_wish' => 1,
            'start_date' => '2024-01-01',
            'start_date_flexibility' => null,
            'end_date_wish' => 1,
            'end_date' => '2024-12-31',
            'end_date_flexibility' => null,
            'campaign_id' => $campaign->id,
            'announcer_id' => $announcer->id,
            'created_by' => $user->id,
            'updated_by' => null,
        ];

        $response = $this->postJson('/api/media', $data);

        $response->assertStatus(201);

        // Récupération du name media plan modifier par l'observer
        $name = $response->json()['data']['name'];
        $response->assertJsonFragment(['name' => $name]);

        $this->assertDatabaseHas('media_plans', [
            'name' => $name,
            'objective' => 1,
            'periodicity' => 'Récurrent',
            'periodicity_one' => 20,
            'budget' => 1000 * 100, // Budget enregistré en centimes
            'start_date_wish' => 1,
            'start_date' => '2024-01-01',
            'start_date_flexibility' => null,
            'end_date_wish' => 1,
            'end_date' => '2024-12-31',
            'end_date_flexibility' => null,
            'campaign_id' => $campaign->id,
            'announcer_id' => $announcer->id,
            'created_by' => $user->id,
            'updated_by' => null,
        ]);
    }
}
