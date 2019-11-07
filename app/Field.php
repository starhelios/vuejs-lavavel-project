<?php

namespace App;

use App\Enums\FieldPosition;
use App\Enums\FieldType;
use App\Enums\LabelValueGenerationType;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use CastsEnums;

    protected $guarded = ['id'];

    protected $enumCasts = [
        'field_type' => FieldType::class,
        'field_position' => FieldPosition::class,
        'label_value_generation_type' => LabelValueGenerationType::class,
    ];

    protected $casts = [
        'field_type' => 'int',
        'field_position' => 'int',
        'label_value_generation_type' => 'int'
    ];



}
