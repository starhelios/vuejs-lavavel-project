<?php

namespace App;

use App\Traits\CampaignChild;

class Creative extends Model
{
   use CampaignChild;
   protected $guarded = ['id'];
   protected $casts = ['data' => 'json'];
   protected $appends = ['label'];
}
