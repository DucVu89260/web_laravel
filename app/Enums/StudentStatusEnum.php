<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StudentStatusEnum extends Enum
{
    public const ON_SCHOOL = 0;
    public const OFF_SCHOOL = 1;
    public const DROP_SCHOOL = 2;

    public static function getArrayView()
    {
        return [

            'On School'     => self::ON_SCHOOL,
            'Off School'    => self::OFF_SCHOOL,
            'Drop School'   => self::DROP_SCHOOL,
        ];
    }

    public static function getKeyByValue($value):string
    {
        return array_search($value, self::getArrayView(),true);
    }
}
