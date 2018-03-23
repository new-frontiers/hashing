<?php
/**
 * Copyright (c) new frontiers Software GmbH
 */

namespace NewFrontiers\Hashing;

class DefaultHasher extends AbstractHasher
{
    /**
     * Returns the options array used in PHP's native function
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [];
    }

    /**
     * Returns the algorithm used
     *
     * @return int
     */
    protected function getAlgorithm(): int
    {
        return PASSWORD_DEFAULT;
    }
}
