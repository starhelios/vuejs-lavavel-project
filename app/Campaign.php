<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFields;
    protected $guarded = ['id'];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function labels()
    {
        return $this->hasMany(LineItem::class);
    }
}
