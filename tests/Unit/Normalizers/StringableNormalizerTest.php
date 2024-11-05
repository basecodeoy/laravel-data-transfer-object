<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use BaseCodeOy\DataTransferObject\AbstractDataTransferObject;
use BaseCodeOy\DataTransferObject\Normalizers\StringableNormalizer;
use Illuminate\Support\Stringable;

it('can serialize', function (): void {
    $dto = new class(['attribute' => 'string']) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new StringableNormalizer(),
            ];
        }
    };

    expect($dto->toArray()['attribute'])->toBeString();
});

it('can deserialize', function (): void {
    $dto = new class(['attribute' => 'string']) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new StringableNormalizer(),
            ];
        }
    };

    expect($dto->attribute)->toBeInstanceOf(Stringable::class);
});
