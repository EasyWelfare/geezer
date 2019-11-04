<?php

namespace Geezer\Command;

use Exception;
use Geezer\Leadership\LeadershipStrategy;
use Geezer\Timing\WaitStrategy;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;

interface RobustCommand
{
    public function leadershipStrategy(): LeadershipStrategy;

    public function waitStrategy(): WaitStrategy;

    public function name(): string;

    public function description(): string;

    public function definition(): InputDefinition;

    public function init(InputInterface $input): void;

    /**
     * @return bool true on success, false otherwise (e.g. nothing to do)
     */
    public function execute(): bool;

    /**
     * @param Exception|null $e
     *
     * @return bool true on successful shutdown, false otherwise
     */
    public function shutdown(?Exception $e = null): bool;
}
