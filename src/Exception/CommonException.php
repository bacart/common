<?php

namespace Bacart\Common\Exception;

class CommonException extends \Exception
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
                $messageOrException->getCode(),
                $messageOrException
            );
        } else {
            parent::__construct('', $code, $previous);
        }
    }
}
