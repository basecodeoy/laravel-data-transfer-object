<?php

declare(strict_types=1);

namespace PreemStudio\DataTransferObject\Normalizers;

use Carbon\Carbon;
use PreemStudio\DataTransferObject\AbstractDataTransferObject;
use PreemStudio\DataTransferObject\Contracts\Normalizer;

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
