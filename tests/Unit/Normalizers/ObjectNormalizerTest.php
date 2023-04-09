<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use PreemStudio\DataTransferObject\AbstractDataTransferObject;
use PreemStudio\DataTransferObject\Normalizers\ObjectNormalizer;

it('can serialize', function (): void {
    $dto = new class(['attribute' => \json_encode(['foo' => 'bar'])]) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new ObjectNormalizer(),
            ];
        }
    };

    expect($dto->toArray()['attribute'])->toBeObject();
});

it('can deserialize', function (): void {
    $dto = new class(['attribute' => \json_encode(['foo' => 'bar'])]) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new ObjectNormalizer(),
            ];
        }
    };

    expect($dto->attribute)->toBeObject();
});
