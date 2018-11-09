<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Util;

/**
 * Class Number
 *
 * @author Walter Discher Cechinel <mistrim@gmail.com>
 */
abstract class Number
{
    const FILL_LEFT = 0;
    const FILL_RIGHT = 1;

    /**
     * @param $value
     * @param $length
     * @param int $fillSide
     * @return string
     * @throws \InvalidArgumentException
     */
    public static function zeroFill($value = '', $length = 0, $fillSide = self::FILL_LEFT)
    {
        $valueLength = strlen($value);

        if ($valueLength == $length) {
            return $value;
        }

        if ($valueLength > $length) {
            throw new \InvalidArgumentException(sprintf(
                'The given value (%s) is invalid',
                $value
            ));
        }

        return str_pad($value, $length, 0, $fillSide);
    }
}
