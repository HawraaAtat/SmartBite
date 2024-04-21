<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AllergensEnum extends Enum
{
    const DAIRY = 1;
    const EGG = 2;
    const GLUTEN = 3;
    const GRAIN = 4;
    const PEANUT = 5;
    const SEAFOOD = 6;
    const SESAME = 7;
    const SHELLFISH = 8;
    const SOY = 9;
    const SULFITE = 10;
    const TREE_NUT = 11;
    const WHEAT = 12;

}
