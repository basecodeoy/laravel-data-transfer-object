<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use BaseCodeOy\DataTransferObject\AbstractDataTransferObject;
use BaseCodeOy\DataTransferObject\Normalizers\CollectionNormalizer;
use Illuminate\Support\Collection;

it('can serialize', function (): void {
    $dto = new class(['attribute' => \json_encode(['foo' => 'bar'])]) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new CollectionNormalizer(),
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
                'attribute' => new CollectionNormalizer(),
            ];
        }
    };

    expect($dto->attribute)->toBeInstanceOf(Collection::class);
});
