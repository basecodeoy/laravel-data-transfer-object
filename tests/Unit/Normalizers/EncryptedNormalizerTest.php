<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use Illuminate\Contracts\Encryption\StringEncrypter;
use BombenProdukt\DataTransferObject\AbstractDataTransferObject;
use BombenProdukt\DataTransferObject\Normalizers\EncryptedNormalizer;

it('can serialize', function (): void {
    $dto = new class(['attribute' => app(StringEncrypter::class)->encryptString('Hello World')]) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => app(EncryptedNormalizer::class),
            ];
        }
    };

    expect($dto->toArray()['attribute'])->toBeString();
});

it('can deserialize', function (): void {
    $dto = new class(['attribute' => app(StringEncrypter::class)->encryptString('Hello World')]) extends AbstractDataTransferObject
    {
        public function normalizers(): array
        {
            return [
                'attribute' => app(EncryptedNormalizer::class),
            ];
        }
    };

    expect($dto->attribute)->toBe('Hello World');
});
