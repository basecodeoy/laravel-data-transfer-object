<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use PreemStudio\DataTransferObject\AbstractDataTransferObject;
use PreemStudio\DataTransferObject\Normalizers\DateTimeImmutableNormalizer;

it('can serialize', function (): void {
    $dto = new class(['attribute' => '01.01.2023 12:00']) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new DateTimeImmutableNormalizer(),
            ];
        }
    };

    expect($dto->toArray())->toBe([
        'attribute' => '2023-01-01T12:00:00+00:00',
    ]);
});

it('can deserialize', function (): void {
    $dto = new class(['attribute' => '01.01.2023 12:00']) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => new DateTimeImmutableNormalizer(),
            ];
        }
    };

    expect($dto->attribute)->toBeInstanceOf(\DateTimeImmutable::class);
});
