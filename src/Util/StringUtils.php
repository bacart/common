<?php

/*
 * This file is part of the Bacart package.
 *
 * (c) Alex Bacart <alex@bacart.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bacart\Common\Util;

class StringUtils
{
    /**
     * @param string $str
     *
     * @return string
     */
    public static function removeMultipleSpaces(string $str): string
    {
        return trim(preg_replace('!\s+!', ' ', $str));
    }

    /**
     * @param string $str
     *
     * @return string
     */
    public static function underscore(string $str): string
    {
        $result = preg_replace(
            [
                '/([A-Z]+)([A-Z][a-z])/',
                '/([a-z\d])([A-Z])/',
            ],
            [
                '\\1_\\2',
                '\\1_\\2',
            ],
            str_replace('_', '.', static::removeMultipleSpaces($str))
        );

        return mb_strtolower($result);
    }

    /**
     * @param string $str
     *
     * @return string
     */
    public static function humanize(string $str): string
    {
        $result = preg_replace(
            [
                '/([A-Z])/',
                '/[-\s]+/',
                '/[_\s]+/',
            ],
            [
                '_$1',
                ' ',
                ' ',
            ],
            static::removeMultipleSpaces($str)
        );

        return mb_ucfirst(mb_strtolower($result));
    }

    /**
     * @param int $number
     * @param int $count
     *
     * @return string
     */
    public static function addLeadingZeros(int $number, int $count): string
    {
        return sprintf('%0'.$count.'d', $number);
    }
}
