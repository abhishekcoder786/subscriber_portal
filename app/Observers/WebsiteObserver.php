<?php

namespace App\Observers;

use App\Models\Website;
use Illuminate\Support\Facades\Cache;

class WebsiteObserver
{
    /**
     * Handle the Website "created" event.
     *
     * @param  \App\Models\Website  $website
     * @return void
     */
    public function created(Website $website)
    {
        Cache::forget('websites');
    }


}
