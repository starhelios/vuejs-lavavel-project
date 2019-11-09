<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class FieldType extends Enum
{

    const Select = 'select';
    const TextInput = 'text';
    const DatePicker = 'date';
    const TimePicker = 'time';
}
