<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\{
    Accommodation,
    Agent,
    Amenity,
    Category,
    Community,
    CompletionStatus,
    Developer,
    Imagegallery,
    OfferType,
    Property,
    PropertyAmenity,
    Subcommunity
};
use Illuminate\Support\Facades\Log;

class XMLSubImageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $apiURL     = 'https://manda.propertybase.com/api/v2/feed/00D4J000000qB4kUAE/XML2U/a0L4J0000008Hk4UAE/full';

        $xml_arr  = simplexml_load_file($apiURL, 'SimpleXMLElement', LIBXML_NOCDATA);
        Log::info('loop end');
        $xml_arr  = json_decode(json_encode($xml_arr, true), true);
        foreach ($xml_arr['listing'] as $key => $value) {
            Log::info('loop key-'.$key."id".$value['id']);

            $allraedy               = Property::where('reference_number', $value['id'])->first();

            $property               = $allraedy ? $allraedy : new Property;
            if ($allraedy) {
                $property->clearMediaCollection('subImages');
            }
           
            if (!empty($value)  && array_key_exists("listing_media", $value) && !empty($value['listing_media']) && array_key_exists("images", $value['listing_media']) && (count($value['listing_media']['images']['image']) > 0)) {
                foreach ($value['listing_media']['images']['image'] as $keys => $img) {                   
                    if(filesize($img['url']) < (128 * 1024)){
                        if ($keys < 5) {
                            Log::info('property-'.$property->id.'image-'.$img['url']);
                            $property->addMediaFromUrl($img['url'])->toMediaCollection('subImages', 'propertyFiles');
                        } else {
                             break;
                        }
                    }
                }
            }
        }
        Log::info('loop end');
        echo "Property Sub Images added successfully.";
    }
}
