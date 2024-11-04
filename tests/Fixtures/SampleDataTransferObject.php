<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use BaseCodeOy\DataTransferObject\AbstractDataTransferObject;

final class SampleDataTransferObject extends AbstractDataTransferObject
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'age' => ['required', 'integer'],
        ];
    }
}
