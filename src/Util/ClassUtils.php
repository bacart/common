<?php

namespace Bacart\Common\Util;

class ClassUtils
{
    /**
     * @param string $class
     *
     * @return string
     */
    public static function getClassNamespace(string $class): string
    {
        if (false === $lastSlashPos = strrpos($class, '\\')) {
            return $class;
        }

        return substr($class, 0, $lastSlashPos);
    }

    /**
     * @param string $class
     *
     * @return string
     */
    public static function getClassBaseName(string $class): string
    {
        if (false === $lastSlash = strrchr($class, '\\')) {
            return $class;
        }

        return substr($lastSlash, 1);
    }

    /**
     * @param string $class
     * @param string $suffix
     *
     * @return string
     */
    public static function getClassShortName(
        string $class,
        string $suffix = ''
    ): string {
        $baseName = static::getClassBaseName($class);

        return preg_replace(sprintf('/%s$/', $suffix), '', $baseName);
    }

    /**
     * @param string $class
     * @param string $suffix
     *
     * @return string
     */
    public static function getClassShortNameUnderscored(
        string $class,
        string $suffix = ''
    ): string {
        $classShortName = static::getClassShortName($class, $suffix);

        return StringUtils::underscore($classShortName);
    }

    /**
     * @param string      $class
     * @param string|null $prefix
     *
     * @return string[]
     */
    public static function getClassConstants(
        string $class,
        string $prefix = null
    ): array {
        $result = [];

        try {
            $reflection = new \ReflectionClass($class);

            foreach ($reflection->getConstants() as $key => $value) {
                if (null === $prefix || 0 === strpos($key, $prefix)) {
                    $result[] = $value;
                }
            }
        } catch (\ReflectionException $e) {
        }

        return $result;
    }
}
