<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ChronicDiseasesEnum extends Enum
{
    const CARDIOVASCULAR_DISEASES = 1;
    const CANCER = 2;
    const RESPIRATORY_DISEASES = 3;
    const DIABETES = 4;
    const ALZHEIMERS_AND_DEMENTIAS = 5;
    const INFECTIOUS_DISEASES = 6;
    const MENTAL_HEALTH_DISORDERS = 7;
    const OBESITY_AND_OVERWEIGHT = 8;
    const CHRONIC_KIDNEY_DISEASE = 9;
    const OSTEOARTHRITIS_AND_RHEUMATOID_ARTHRITIS = 10;
    const GASTROESOPHAGEAL_REFLUX_DISEASE = 11;
    const OTHER = 12;
}
