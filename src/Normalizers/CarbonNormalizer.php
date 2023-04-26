<?php

declare(strict_types=1);

namespace BombenProdukt\DataTransferObject\Normalizers;

use Carbon\Carbon;
use BombenProdukt\DataTransferObject\AbstractDataTransferObject;
use BombenProdukt\DataTransferObject\Contracts\Normalizer;

final class CarbonNormalizer implements Normalizer
{
    public function __construct(
        private readonly ?string $timezone = null,
        private readonly ?string $format = null,
    ) {
        //
    }

    /**
     * @param Carbon $value
     */
    public function serialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        return $value->toString();
    }

    public function deserialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed
    {
        if (empty($this->format)) {
            return Carbon::parse($value, $this->timezone);
        }

        return Carbon::createFromFormat($this->format, $value, $this->timezone);
    }
}
