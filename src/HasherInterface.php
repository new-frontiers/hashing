<?php
/**
 * Copyright (c) new frontiers Software GmbH
 */

namespace NewFrontiers\Hashing;

interface HasherInterface
{
    /**
     * Retrieve information about the given hash
     *
     * @param string $hashedValue
     * @return array
     */
    public function info(string $hashedValue): array;

    /**
     * Hash the given value
     *
     * @param string $value
     * @return string
     */
    public function hash(string $value): string;

    /**
     * Check the given plain value against a hash
     *
     * @param string $value
     * @param string $hashedValue
     * @return bool
     */
    public function verify(string $value, string $hashedValue): bool;

    /**
     * Check if the given hash has been hashed using the same options
     *
     * @param string $hashedValue
     * @return bool true, if not and the value needs rehashing
     */
    public function needsRehash(string$hashedValue): bool;
}
