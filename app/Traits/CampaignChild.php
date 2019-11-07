<?php
namespace App\Traits;

use App\Campaign;

trait CampaignChild {

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}