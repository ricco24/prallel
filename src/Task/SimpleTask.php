<?php

namespace Parallel\Task;

use Parallel\TaskResult\ErrorResult;
use Parallel\TaskResult\SkipResult;
use Parallel\TaskResult\SuccessResult;
use Parallel\TaskResult\TaskResult;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Parallel\Task as BaseTask;

abstract class SimpleTask extends BaseTask
{
    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return TaskResult
     */
    protected function process(InputInterface $input, OutputInterface $output): TaskResult
    {
        $this->notifyStart();
        $result = $this->processTask($input, $output);
        $this->notifyEnd([
            'success' => $result instanceof SuccessResult ? 1 : 0,
            'skip' => $result instanceof SkipResult ? 1 : 0,
            'error' => $result instanceof ErrorResult ? 1 : 0
        ]);
        return $result;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return TaskResult
     */
    abstract protected function processTask(InputInterface $input, OutputInterface $output): TaskResult;
}