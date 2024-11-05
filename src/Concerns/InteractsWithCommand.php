<?php

declare(strict_types=1);

namespace BaseCodeOy\DataTransferObject\Concerns;

use Illuminate\Console\Command;

trait InteractsWithCommand
{
    public static function fromCommand(Command $command): self
    {
        return new static([
            ...$command->arguments(),
            ...$command->options(),
        ]);
    }

    public static function fromCommandArguments(Command $command): self
    {
        return new static($command->arguments());
    }

    public static function fromCommandOptions(Command $command): self
    {
        return new static($command->options());
    }
}
