<?php

namespace App;

use App\Traits\CampaignChild;

class InsertionOrder extends Model
{
    use CampaignChild;

    protected $guarded = ['id'];
    protected $appends = ['label'];
    protected $casts = [
        'data' => 'json',
    ];
}
