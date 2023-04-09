<?php

declare(strict_types=1);

namespace PreemStudio\DataTransferObject\Normalizers;

use Illuminate\Support\Str;
use PreemStudio\DataTransferObject\AbstractDataTransferObject;
use PreemStudio\DataTransferObject\Contracts\Normalizer;

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
