<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class LabelValueGenerationType extends Enum
{
    const None =   0;
    const ThreeLeftTwoRight =   1;
    const TwoLeftThreeRight = 2;
}
