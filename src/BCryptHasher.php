<?php
/**
 * Copyright (c) new frontiers Software GmbH
 */

namespace NewFrontiers\Hashing;

class BCryptHasher extends AbstractHasher
{

    /**
     * The cost
     *
     * @var int
     */
    private $cost;


    /**
     * BCryptHasher constructor
     *
     * @param int $cost
     */
    public function __construct(int $cost = 10)
    {
        $this->cost = $cost;
    }


    /**
     * Returns the options array used in PHP's native function
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            'cost' => $this->cost
        ];
    }

    /**
     * Returns the algorithm used
     *
     * @return int
     */
    protected function getAlgorithm(): int
    {
        return PASSWORD_BCRYPT;
    }
}
