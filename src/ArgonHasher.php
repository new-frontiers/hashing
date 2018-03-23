<?php
/**
 * Copyright (c) new frontiers Software GmbH
 */

namespace NewFrontiers\Hashing;

class ArgonHasher extends AbstractHasher
{

    /**
     * The memory cost factor
     *
     * @var int
     */
    protected $memory;

    /**
     * The time cost factor
     *
     * @var int
     */
    protected $time;

    /**
     * The  threads factor
     *
     * @var int
     */
    protected $threads;


    /**
     * ArgonHasher constructor
     *
     * @param int $memory
     * @param int $time
     * @param int $threads
     */
    public function __construct(int $memory = 1024, int $time = 2, int $threads = 2)
    {
        $this->memory = $memory;
        $this->time = $time;
        $this->threads = $threads;
    }


    /**
     * Returns the options array used in PHP's native function
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            'memory_cost' => $this->memory,
            'time_cost' => $this->time,
            'threads' => $this->threads,
        ];
    }

    /**
     * Returns the algorithm used
     *
     * @return int
     */
    protected function getAlgorithm(): int
    {
        return PASSWORD_ARGON2I;
    }
}