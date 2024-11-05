<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use Tests\Fixtures\SampleDataTransferObject;
use Tests\Fixtures\User;

it('creates a data transfer object from a model', function (): void {
    $data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ];

    $dto = SampleDataTransferObject::fromModel(new User($data));

    expect($dto->toArray())->toBe($data);
});

it('converts a data transfer object to a model', function (): void {
    $data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ];

    $dto = SampleDataTransferObject::fromArray($data);

    $model = $dto->toModel(User::class);

    expect($model->toArray())->toBe($data);
});
