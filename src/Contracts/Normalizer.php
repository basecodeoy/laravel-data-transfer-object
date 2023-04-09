<?php

declare(strict_types=1);

namespace PreemStudio\DataTransferObject\Contracts;

use PreemStudio\DataTransferObject\AbstractDataTransferObject;

interface Normalizer
{
    /**
     * Prepare the given value for storage.
     */
    public function serialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed;

    /**
     * Cast the given value.
     */
    public function deserialize(AbstractDataTransferObject $data, string $key, mixed $value): mixed;
}
