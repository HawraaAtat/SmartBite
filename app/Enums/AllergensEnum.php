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
    const DAIRY = 'Dairy';
    const EGG = 'Egg';
    const GLUTEN = 'Gluten';
    const GRAIN = 'Grain';
    const PEANUT = 'Peanut';
    const SEAFOOD = 'Seafood';
    const SESAME = 'Sesame';
    const SHELLFISH = 'Shellfish';
    const SOY = 'Soy';
    const SULFITE = 'Sulfite';
    const TREE_NUT = 'Tree Nut';
    const WHEAT = 'Wheat';
}
