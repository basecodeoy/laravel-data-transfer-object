<?php

declare(strict_types=1);

namespace BaseCodeOy\DataTransferObject\Normalizers;

use BaseCodeOy\DataTransferObject\AbstractDataTransferObject;
use BaseCodeOy\DataTransferObject\Contracts\Normalizer;

final class IntegerNormalizer implements Normalizer
{
    public function serialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        return $value;
    }

    public function deserialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        return (int) $value;
    }
}
