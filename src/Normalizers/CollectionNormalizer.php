<?php

declare(strict_types=1);

namespace BombenProdukt\DataTransferObject\Normalizers;

use BombenProdukt\DataTransferObject\AbstractDataTransferObject;
use BombenProdukt\DataTransferObject\Contracts\Normalizer;
use Illuminate\Support\Collection;

final class CollectionNormalizer implements Normalizer
{
    /**
     * @param Collection $value
     */
    public function serialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        return $value->toArray();
    }

    public function deserialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        if (\is_string($value)) {
            $value = \json_decode($value, true, 512, \JSON_THROW_ON_ERROR);
        }

        return new Collection($value);
    }
}
