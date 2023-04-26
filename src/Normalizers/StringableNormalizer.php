<?php

declare(strict_types=1);

namespace BombenProdukt\DataTransferObject\Normalizers;

use BombenProdukt\DataTransferObject\AbstractDataTransferObject;
use BombenProdukt\DataTransferObject\Contracts\Normalizer;
use Illuminate\Support\Str;

final class StringableNormalizer implements Normalizer
{
    /**
     * @param Str $value
     */
    public function serialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        return (string) $value;
    }

    public function deserialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        return Str::of($value);
    }
}
