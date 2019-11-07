<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class FieldPosition extends Enum
{
    const Campaign =   0;
    const LabelGeneral =   1;
    const LabelTargeting = 2;
    const Creative = 3;
}
