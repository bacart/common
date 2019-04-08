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

use Bacart\Common\Exception\JsonException;

class JsonUtils
{
    /**
     * @param mixed $value
     * @param int   $options
     * @param int   $depth
     *
     * @throws JsonException
     *
     * @return string
     */
    public static function jsonEncode(
        $value,
        int $options = 0,
        int $depth = 512
    ): string {
        $json = json_encode($value, $options, $depth);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new JsonException(json_last_error_msg());
        }

        return $json;
    }

    /**
     * @param string $json
     * @param bool   $assoc
     * @param int    $depth
     * @param int    $options
     *
     * @throws JsonException
     *
     * @return mixed
     */
    public static function jsonDecode(
        string $json,
        bool $assoc = false,
        int $depth = 512,
        int $options = 0
    ) {
        $data = json_decode($json, $assoc, $depth, $options);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new JsonException(json_last_error_msg());
        }

        return $data;
    }
}
