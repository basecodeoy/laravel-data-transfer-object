<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use Illuminate\Console\Command;
use Mockery;
use Tests\Fixtures\SampleDataTransferObject;

it('creates a data transfer object from a command', function (): void {
    $data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ];

    $command = Mockery::mock(Command::class);
    $command->shouldReceive('arguments')->andReturn($data);
    $command->shouldReceive('options')->andReturn([]);

    $dto = SampleDataTransferObject::fromCommand($command);

    expect($dto->toArray())->toBe($data);
});

it('creates a data transfer object from command arguments', function (): void {
    $data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ];

    $command = Mockery::mock(Command::class);
    $command->shouldReceive('arguments')->andReturn($data);

    $dto = SampleDataTransferObject::fromCommandArguments($command);

    expect($dto->toArray())->toBe($data);
});

it('creates a data transfer object from command options', function (): void {
    $options = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
    ];

    $command = Mockery::mock(Command::class);
    $command->shouldReceive('options')->andReturn($options);

    $dto = SampleDataTransferObject::fromCommandOptions($command);

    expect($dto->toArray())->toBe($options);
});
