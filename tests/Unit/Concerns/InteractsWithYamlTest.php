<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use Symfony\Component\Yaml\Yaml;
use Tests\Fixtures\SampleDataTransferObject;

it('creates a data transfer object from YAML', function (): void {
    $data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ];

    $yaml = Yaml::dump($data);

    $dto = SampleDataTransferObject::fromYaml($yaml);

    expect($dto->toArray())->toBe($data);
});

it('creates a data transfer object from a YAML file', function (): void {
    $data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ];

    $yaml = Yaml::dump($data);
    $filePath = \sys_get_temp_dir().'/test_yaml.yaml';
    \file_put_contents($filePath, $yaml);

    $dto = SampleDataTransferObject::fromYamlFile($filePath);

    expect($dto->toArray())->toBe($data);
    \unlink($filePath);
});

it('converts a data transfer object to YAML', function (): void {
    $data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ];

    $dto = SampleDataTransferObject::fromArray($data);

    expect($dto->toYaml())->toBe(Yaml::dump($data));
});
