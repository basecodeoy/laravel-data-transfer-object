<?php

declare(strict_types=1);

namespace PreemStudio\DataTransferObject\Normalizers;

use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Contracts\Encryption\StringEncrypter;
use PreemStudio\DataTransferObject\AbstractDataTransferObject;
use PreemStudio\DataTransferObject\Contracts\Normalizer;

final class EncryptedNormalizer implements Normalizer
{
    public function __construct(
        private readonly Encrypter $encrypter,
        private readonly StringEncrypter $stringEncrypter,
    ) {
        //
    }

    public function serialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        if (\is_string($value)) {
            return $this->stringEncrypter->encryptString($value);
        }

        return $this->encrypter->encrypt($value);
    }

    public function deserialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        if (\is_string($value)) {
            return $this->stringEncrypter->decryptString($value);
        }

        return $this->encrypter->decrypt($value);
    }
}
