<?php

namespace Bacart\Common\Exception;

abstract class AbstractCommonException extends \Exception
{
    /**
     * {@inheritdoc}
     *
     * @param \Throwable|string $messageOrException
     */
    public function __construct(
        $messageOrException,
        int $code = 0,
        \Throwable $previous = null
    ) {
        if (\is_string($messageOrException)) {
            parent::__construct($messageOrException, $code, $previous);
        } elseif ($messageOrException instanceof \Throwable) {
            parent::__construct(
                $messageOrException->getMessage(),
                $code ?: $messageOrException->getCode(),
                $previous ?: $messageOrException->getPrevious()
            );
        } else {
            parent::__construct('', $code, $previous);
        }
    }
}
