<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

namespace Web1\StringGenerator;

/**
 * Class PasswordGenerator
 *
 * @package Web1\StringGenerator
 */
class PasswordGenerator
{
    const PASSWORD_EASY     = 0;
    const PASSWORD_MEDIUM   = 1;
    const PASSWORD_HARD     = 2;

    /**
     * @var string
     */
    private static $passwordCharEasy      = 'abcdefghijklmnopqrstuvwxyz';

    /**
     * @var string
     */
    private static $passwordCharMedium    = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    /**
     * @var string
     */
    private static $passwordCharHard      = 'éèà&#!$€£%+=@<?./,;:=+&é(§é!)-';

    /**
     * @var int
     */
    private static $passwordDefaultLength = 10;

    /**
     * @param null $number
     * @param int  $strength
     *
     * @return string
     *
     * @throws \Exception
     */
    public static function getRandomString($number = null, $strength = self::PASSWORD_MEDIUM)
    {
        if (!in_array($strength, [
            self::PASSWORD_EASY,
            self::PASSWORD_MEDIUM,
            self::PASSWORD_HARD,
        ]))
            throw new \Exception('Bad strength!');

        $length = (is_null($number))
            ? self::$passwordDefaultLength
            : (0 === (int)$number)
                ? self::$passwordDefaultLength
                : (int)$number;
        $password = $char = '';

        switch ($strength) {
            case self::PASSWORD_EASY:
                $char = self::$passwordCharEasy;
                break;
            case self::PASSWORD_MEDIUM:
                $char = self::$passwordCharEasy.self::$passwordCharMedium;
                break;
            case self::PASSWORD_HARD:
                $char = self::$passwordCharEasy.self::$passwordCharMedium.self::$passwordCharHard;
        }

        for ($i = 0; $i < $length; $i++) {
            $password .= mb_substr($char, rand(0, (mb_strlen($char)-1)), 1);
        }

        return $password;
    }
} 