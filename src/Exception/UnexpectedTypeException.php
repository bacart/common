<?php

namespace Bacart\Common\Exception;

class UnexpectedTypeException extends AbstractCommonException
{
    /**
     * {@inheritdoc}
     *
     * @param mixed  $value
     * @param string $expectedType
     */
    public function __construct($value, string $expectedType)
    {
        if (null === $value) {
            $givenType = 'NULL';
        } elseif (\is_string($value)) {
            $givenType = $value;
        } else {
            $givenType = \is_object($value) ? \get_class($value) : \gettype($value);
        }

        parent::__construct(sprintf(
            'Expected argument of type "%s", "%s" given',
            $expectedType,
            $givenType
        ));
    }
}
