<?php
namespace App\Traits;

use App\Campaign;

trait CampaignChild {

    use HasLabel;

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}