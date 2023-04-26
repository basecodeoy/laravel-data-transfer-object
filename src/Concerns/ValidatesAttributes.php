<?php

declare(strict_types=1);

namespace BombenProdukt\DataTransferObject\Concerns;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

trait ValidatesAttributes
{
    protected array $validated = [];

    public function rules(): array
    {
        return [];
    }

    public function messages(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return [];
    }

    protected function validateAttributes(): void
    {
        if (empty($this->rules())) {
            $this->validated = $this->unvalidated;

            return;
        }

        $validator = Validator::make($this->unvalidated, $this->rules(), $this->messages(), $this->attributes());

        if ($validator->failed()) {
            throw new ValidationException($validator);
        }

        $this->validated = $validator->validated();
    }
}
