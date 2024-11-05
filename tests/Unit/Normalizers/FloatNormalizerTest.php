<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use BaseCodeOy\DataTransferObject\AbstractDataTransferObject;
use BaseCodeOy\DataTransferObject\Normalizers\FloatNormalizer;

it('can serialize', function (): void {
    $dto = new class(['attribute' => '123']) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new FloatNormalizer(),
            ];
        }
    };

    expect($dto->toArray())->toBe([
        'attribute' => 123.0,
    ]);
});

it('can deserialize', function (): void {
    $dto = new class(['attribute' => '123']) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new FloatNormalizer(),
            ];
        }
    };

    expect($dto->attribute)->toBeFloat();
});
