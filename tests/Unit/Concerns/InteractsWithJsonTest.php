<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use Tests\Fixtures\SampleDataTransferObject;

it('creates a data transfer object from JSON', function (): void {
    $data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ];

    $json = \json_encode($data);

    $dto = SampleDataTransferObject::fromJson($json);

    expect($dto->toArray())->toBe($data);
});

it('creates a data transfer object from a JSON file', function (): void {
    $data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ];

    $json = \json_encode($data);
    $filePath = \sys_get_temp_dir().'/test_json.json';
    \file_put_contents($filePath, $json);

    $dto = SampleDataTransferObject::fromJsonFile($filePath);

    expect($dto->toArray())->toBe($data);
    \unlink($filePath);
});

it('converts a data transfer object to JSON', function (): void {
    $data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ];

    $dto = SampleDataTransferObject::fromArray($data);

    expect($dto->toJson())->toBe(\json_encode($data));
    expect($dto->toJson(true))->toBe(\json_encode($data, \JSON_PRETTY_PRINT));
});
