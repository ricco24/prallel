<?php

namespace Parallel\Output;

use Symfony\Component\Console\Output\OutputInterface;

interface Output
{
    public function startMessage(OutputInterface $output): void;

    public function errorMessage(OutputInterface $output, string $error): void;

    public function printToOutput(OutputInterface $output, array $data, float $elapsedTime): void;

    public function finishMessage(OutputInterface $output, array $data, float $duration): void;
}
