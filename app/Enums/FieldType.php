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
    const DropDown =   0;
    const Text =   1;
    const Date = 2;
    const Time = 3;
    const Creatives = 4;
}
