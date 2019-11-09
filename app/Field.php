<?php

namespace App;

use App\Enums\FieldPosition;
use App\Enums\FieldType;
use App\Enums\LabelValueGenerationType;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Field extends Model
{
    use CastsEnums;

    protected $guarded = ['id'];

    protected $enumCasts = [
        'field_type' => FieldType::class,
        'position' => FieldPosition::class,
        'label_value_generation_type' => LabelValueGenerationType::class,
    ];

    protected $casts = [
        'field_type' => 'string',
        'field_position' => 'int',
        'label_value_generation_type' => 'int'
    ];


    public function getComponentNameAttribute()
    {
        return 'ag-' . Str::kebab($this->field_type->key);
    }

    public function field_values()
    {
        return $this->hasMany(FieldValue::class);
    }
}
