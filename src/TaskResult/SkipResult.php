<?php

namespace Parallel\TaskResult;

class SkipResult extends BaseTaskResult
{
    /**
     * Result return code
     * @return int
     */
    public function getCode(): int
    {
        return 50;
    }

    /**
     * @return string
     */
    public function getShortName(): string
    {
        return 'skip';
    }
}
