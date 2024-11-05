<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use BaseCodeOy\DataTransferObject\AbstractDataTransferObject;
use BaseCodeOy\DataTransferObject\Normalizers\FloatNormalizer;
use BaseCodeOy\DataTransferObject\Normalizers\StringableNormalizer;

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
