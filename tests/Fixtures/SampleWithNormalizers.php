<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use BombenProdukt\DataTransferObject\AbstractDataTransferObject;
use BombenProdukt\DataTransferObject\Normalizers\FloatNormalizer;
use BombenProdukt\DataTransferObject\Normalizers\StringableNormalizer;

final class SampleWithNormalizers extends AbstractDataTransferObject
{
    public function normalizers(): array
    {
        return [
            'email' => new StringableNormalizer(),
            'age' => new FloatNormalizer(),
        ];
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'age' => ['required', 'integer'],
        ];
    }
}
