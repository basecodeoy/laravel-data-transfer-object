<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use PreemStudio\DataTransferObject\AbstractDataTransferObject;
use PreemStudio\DataTransferObject\Normalizers\IntegerNormalizer;

it('can serialize', function (): void {
    $dto = new class(['attribute' => '123']) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new IntegerNormalizer(),
            ];
        }
    };

    expect($dto->toArray())->toBe([
        'attribute' => 123,
    ]);
});

it('can deserialize', function (): void {
    $dto = new class(['attribute' => '123']) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new IntegerNormalizer(),
            ];
        }
    };

    expect($dto->attribute)->toBeInt();
});
