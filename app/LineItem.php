<?php

namespace App;

use App\Traits\CampaignChild;
use Illuminate\Database\Eloquent\Model;

class LineItem extends Model
{
    use HasFields, CampaignChild;
    protected $guarded = ['id'];
    protected $casts = ['data' => 'json'];
    protected $appends = ['label'];

}
