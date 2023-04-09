<?php

declare(strict_types=1);

namespace PreemStudio\DataTransferObject\Normalizers;

use PreemStudio\DataTransferObject\AbstractDataTransferObject;
use PreemStudio\DataTransferObject\Contracts\Normalizer;

final class ClassNormalizer implements Normalizer
{
    public function __construct(private readonly string $targetClass)
    {
        //
    }

    public function serialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        return $value;
    }

    public function deserialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        if (\is_string($value)) {
            $value = \json_decode($value, true, 512, \JSON_THROW_ON_ERROR);
        }

        return new $this->targetClass($value);
    }
}
