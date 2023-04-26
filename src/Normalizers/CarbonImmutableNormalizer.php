<?php

declare(strict_types=1);

namespace BombenProdukt\DataTransferObject\Normalizers;

use BombenProdukt\DataTransferObject\AbstractDataTransferObject;
use BombenProdukt\DataTransferObject\Contracts\Normalizer;
use Carbon\CarbonImmutable;

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
