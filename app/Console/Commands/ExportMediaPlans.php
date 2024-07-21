<?php

namespace App\Console\Commands;

use App\Http\Resources\MediaPlan\MediaPlanCollection;
use App\Models\MediaPlan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ExportMediaPlans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-media';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export media plans au format JSON';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $mediaPlanCollection = new MediaPlanCollection(MediaPlan::all());
        $json = $mediaPlanCollection->toJson();

        $filePath = 'exports/media_plans.json';

        Storage::disk('local')->put($filePath, $json);

        $this->info("Le fichier avec les medias est disponible ici : storage/".$filePath);
    }
}
