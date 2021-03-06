<?php

namespace App\Console\Commands;

use App\Services\Downloads\Service;
use Geocoder\Provider\GoogleMaps\Model\GoogleAddress;
use Illuminate\Console\Command;

class ImportDownloadsData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:download-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import download data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Service $service)
    {
        $data = config('data-seeder');
        $geocoder = app('geocoder');
        foreach ($data['import-data'] as $item) {
            try {
                $item = (object)$item;
                /** @var GoogleAddress $dt */
                $dt = $geocoder->geocode(implode(', ', [$item->city, $item->country]))->get(0)->first();

                if ($dt) {
                    $id = $service->addDownloadEntry(
                        $item->app_id,
                        $dt->getCoordinates()->getLatitude(),
                        $dt->getCoordinates()->getLongitude()
                    );
                    $this->info("Entry #{$id}");
                }
            } catch (\Exception $ex) {
                $this->warn($ex->getMessage());
            }
        }
    }
}
