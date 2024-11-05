<?php

declare(strict_types=1);

namespace BaseCodeOy\DataTransferObject\Normalizers;

use BaseCodeOy\DataTransferObject\AbstractDataTransferObject;
use BaseCodeOy\DataTransferObject\Contracts\Normalizer;

final class ArrayNormalizer implements Normalizer
{
    public function serialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        return $value;
    }

    public function deserialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        if (\is_string($value)) {
            return \json_decode($value, true, 512, \JSON_THROW_ON_ERROR);
        }

        return (array) $value;
    }
}
