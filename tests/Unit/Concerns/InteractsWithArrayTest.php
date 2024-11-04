<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use Tests\Fixtures\SampleDataTransferObject;

it('creates a data transfer object from an array', function (): void {
    $data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ];

    $dto = SampleDataTransferObject::fromArray($data);

    expect($dto->toArray())->toBe($data);
});
