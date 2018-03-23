<?php
/**
 * Copyright (c) new frontiers Software GmbH
 */

namespace NewFrontiers\Hashing;

abstract class AbstractHasher implements HasherInterface
{

    /**
     * Retrieve information about the given hash
     *
     * @param string $hashedValue
     * @return array
     */
    public function info(string $hashedValue): array
    {
        return password_get_info($hashedValue);
    }

    /**
     * Hash the given value
     *
     * @param string $value
     * @return string
     */
    public function hash(string $value): string
    {
        $hash = password_hash($value, $this->getAlgorithm(), $this->getOptions());
        if ($hash === false) {
            throw new \RuntimeException('Hash algorithm not supported.');
        }
        return $hash;
    }

    /**
     * Check the given plain value against a hash
     *
     * @param string $value
     * @param string $hashedValue
     * @param array $options
     * @return bool
     */
    public function verify(string $value, string $hashedValue, array $options = []): bool
    {
        if ('' === $hashedValue) {
            return false;
        }
        return password_verify($value, $hashedValue);
    }

    /**
     * Check if the given hash has been hashed using the same options
     *
     * @param string $hashedValue
     * @param array $options
     * @return bool true, if not and the value needs rehashing
     */
    public function needsRehash(string $hashedValue, array $options = []): bool
    {
        return password_needs_rehash($hashedValue, $this->getAlgorithm(), $this->getOptions());
    }

    /**
     * Returns the options array used in PHP's native function
     *
     * @return array
     */
    abstract protected function getOptions(): array;

    /**
     * Returns the algorithm used
     *
     * @return int
     */
    abstract protected function getAlgorithm(): int;
}
