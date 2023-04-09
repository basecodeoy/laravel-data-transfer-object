<?php

declare(strict_types=1);

namespace PreemStudio\DataTransferObject\Normalizers;

use PreemStudio\DataTransferObject\AbstractDataTransferObject;
use PreemStudio\DataTransferObject\Contracts\Normalizer;

final class FloatNormalizer implements Normalizer
{
    public function serialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        return $value;
    }

    public function deserialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        return (float) $value;
    }
}
