<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use BombenProdukt\DataTransferObject\AbstractDataTransferObject;
use BombenProdukt\DataTransferObject\Normalizers\ArrayNormalizer;

it('can serialize', function (): void {
    $dto = new class(['attribute' => \json_encode(['foo' => 'bar'])]) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new ArrayNormalizer(),
            ];
        }
    };

    expect($dto->toArray())->toBe([
        'attribute' => ['foo' => 'bar'],
    ]);
});

it('can deserialize', function (): void {
    $dto = new class(['attribute' => \json_encode(['foo' => 'bar'])]) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new ArrayNormalizer(),
            ];
        }
    };

    expect($dto->attribute)->toBeArray();
});
