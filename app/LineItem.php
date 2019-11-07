<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineItem extends Model
{
    use HasFields;
    protected $guarded = ['id'];


    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function creatives()
    {
        return $this->hasMany(Creative::class);
    }
}
