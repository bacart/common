<?php

namespace Bacart\Common\Exception;

class MissingPackageException extends AbstractCommonException
{
    /**
     * {@inheritdoc}
     *
     * @param string $packageName
     */
    public function __construct(string $packageName)
    {
        parent::__construct(sprintf(
            'Composer package "%s" is missing. Try running "composer require %s".',
            $packageName,
            $packageName
        ));
    }
}
