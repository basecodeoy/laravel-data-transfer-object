<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use Illuminate\Validation\ValidationException;
use PreemStudio\DataTransferObject\AbstractDataTransferObject;
use Tests\Fixtures\SampleDataTransferObject;

it('validates arguments', function (): void {
    $data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ];

    $dto = SampleDataTransferObject::fromArray($data);

    expect($dto->toArray())->toBe($data);
});

it('throws a validation exception for invalid arguments', function (): void {
    SampleDataTransferObject::fromArray([
        'name' => 'John Doe',
        'email' => 'invalid_email',
        'age' => 30,
    ]);
})->throws(ValidationException::class);

it('sets custom validation rules, messages and attributes', function (): void {
    $dto = new class(['name' => 'John Doe', 'email' => 'john.doe@example.com', 'age' => 30]) extends AbstractDataTransferObject
    {
        public function rules(): array
        {
            return [
                'name' => 'required|string',
                'email' => 'required|email',
                'age' => 'required|integer',
            ];
        }

        public function messages(): array
        {
            return [
                'name.required' => 'Name is required.',
                'email.required' => 'Email is required.',
                'age.required' => 'Age is required.',
            ];
        }

        public function attributes(): array
        {
            return [
                'name' => 'Full Name',
                'email' => 'Email Address',
                'age' => 'Age in Years',
            ];
        }
    };

    expect($dto->rules())->toBe([
        'name' => 'required|string',
        'email' => 'required|email',
        'age' => 'required|integer',
    ]);

    expect($dto->messages())->toBe([
        'name.required' => 'Name is required.',
        'email.required' => 'Email is required.',
        'age.required' => 'Age is required.',
    ]);

    expect($dto->attributes())->toBe([
        'name' => 'Full Name',
        'email' => 'Email Address',
        'age' => 'Age in Years',
    ]);
});
