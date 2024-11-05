<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use BaseCodeOy\DataTransferObject\AbstractDataTransferObject;
use BaseCodeOy\DataTransferObject\Normalizers\BooleanNormalizer;

it('can serialize', function (): void {
    $dto = new class(['attribute' => '123']) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new BooleanNormalizer(),
            ];
        }
    };

    expect($dto->toArray())->toBe([
        'attribute' => true,
    ]);
});

it('can deserialize', function (): void {
    $dto = new class(['attribute' => '123']) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new BooleanNormalizer(),
            ];
        }
    };

    expect($dto->attribute)->toBeBool();
});
