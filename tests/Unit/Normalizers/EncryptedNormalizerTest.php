<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use BaseCodeOy\DataTransferObject\AbstractDataTransferObject;
use BaseCodeOy\DataTransferObject\Normalizers\EncryptedNormalizer;
use Illuminate\Contracts\Encryption\StringEncrypter;

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
