<?php

if (!function_exists('mb_ucfirst')) {
    /**
     * @param string $str
     *
     * @return string
     */
    function mb_ucfirst(string $str): string
    {
        return mb_strtoupper(mb_substr($str, 0, 1)).mb_substr($str, 1);
    }
}

if (!function_exists('mb_lcfirst')) {
    /**
     * @param string $str
     *
     * @return string
     */
    function mb_lcfirst(string $str): string
    {
        return mb_strtolower(mb_substr($str, 0, 1)).mb_substr($str, 1);
    }
}
