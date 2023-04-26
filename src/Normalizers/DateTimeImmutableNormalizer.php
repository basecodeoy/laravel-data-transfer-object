<?php

declare(strict_types=1);

namespace BombenProdukt\DataTransferObject\Normalizers;

use BombenProdukt\DataTransferObject\AbstractDataTransferObject;
use BombenProdukt\DataTransferObject\Contracts\Normalizer;

final class DateTimeImmutableNormalizer implements Normalizer
{
    public function __construct(
        private readonly ?string $timezone = null,
        private readonly ?string $format = null,
    ) {
        //
    }

    /**
     * @param \DateTime $value
     */
    public function serialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        return $value->format(\DateTimeInterface::ATOM);
    }

    public function deserialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        if (empty($this->format)) {
            return new \DateTimeImmutable($value, $this->timezone);
        }

        return \DateTimeImmutable::createFromFormat($this->format, $value, $this->timezone);
    }
}
