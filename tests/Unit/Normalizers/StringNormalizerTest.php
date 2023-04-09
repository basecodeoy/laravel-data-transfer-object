<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use PreemStudio\DataTransferObject\AbstractDataTransferObject;
use PreemStudio\DataTransferObject\Normalizers\StringNormalizer;

it('can serialize', function (): void {
    $dto = new class(['attribute' => 123]) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new StringNormalizer(),
            ];
        }
    };

    expect($dto->toArray())->toBe([
        'attribute' => '123',
    ]);
});

it('can deserialize', function (): void {
    $dto = new class(['attribute' => \json_encode(['foo' => 'bar'])]) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new StringNormalizer(),
            ];
        }
    };

    expect($dto->attribute)->toBeString();
});
