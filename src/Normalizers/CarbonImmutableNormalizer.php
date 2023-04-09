<?php

declare(strict_types=1);

namespace PreemStudio\DataTransferObject\Normalizers;

use Carbon\CarbonImmutable;
use PreemStudio\DataTransferObject\AbstractDataTransferObject;
use PreemStudio\DataTransferObject\Contracts\Normalizer;

final class CarbonImmutableNormalizer implements Normalizer
{
    public function __construct(
        private readonly ?string $timezone = null,
        private readonly ?string $format = null,
    ) {
        //
    }

    /**
     * @param CarbonImmutable $value
     */
    public function serialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        return $value->toString();
    }

    public function deserialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        if (empty($this->format)) {
            return CarbonImmutable::parse($value, $this->timezone);
        }

        return CarbonImmutable::createFromFormat($this->format, $value, $this->timezone);
    }
}
