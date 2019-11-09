<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFields;
    protected $guarded = ['id'];

    protected $casts = [
        'campaign_data' => 'json',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function line_items()
    {
        return $this->hasMany(LineItem::class);
    }

    public function creatives()
    {
        return $this->hasMany(Creative::class);
    }

    public function insertion_orders()
    {
        return $this->hasMany(InsertionOrder::class);
    }

    public function getUriAttribute()
    {
        return route('campaigns.show', ['campaign' => $this->id]);
    }
}
