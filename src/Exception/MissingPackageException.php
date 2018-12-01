<?php

/*
 * This file is part of the Bacart package.
 *
 * (c) Alex Bacart <alex@bacart.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
