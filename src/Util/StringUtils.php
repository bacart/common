<?php

declare(strict_types=1);

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
        $result = preg_replace('/\s+/u', ' ', $str);

        return trim($result);
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
     * @param $str
     *
     * @return string
     */
    public static function removeEmoji(string $str): string
    {
        $patterns = [
            '/[\x{1F600}-\x{1F64F}]/u', // Emoticons
            '/[\x{1F300}-\x{1F5FF}]/u', // Miscellaneous symbols and pictographs
            '/[\x{1F680}-\x{1F6FF}]/u', // Transport and map symbols
            '/[\x{2600}-\x{26FF}]/u',   // Miscellaneous symbols
            '/[\x{2700}-\x{27BF}]/u',   // Dingbats
        ];

        foreach ($patterns as $pattern) {
            $str = preg_replace(
                $pattern,
                ' ',
                $str
            );
        }

        return static::removeMultipleSpaces($str);
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
