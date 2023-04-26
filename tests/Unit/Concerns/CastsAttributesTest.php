<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use Illuminate\Support\Stringable;
use Tests\Fixtures\SampleWithNormalizers;

it('creates an instance and normalizers attributes when calling a `from` function', function (): void {
    $dto = SampleWithNormalizers::fromArray([
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ]);

    expect($dto->name)->toBeString();
    expect($dto->email)->toBeInstanceOf(Stringable::class);
    expect($dto->age)->toBeFloat();
});

it('normalizers attributes to their serialized representations', function (): void {
    $data = SampleWithNormalizers::fromArray([
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ])->toArray();

    expect($data['name'])->toBeString();
    expect($data['email'])->toBeString();
    expect($data['age'])->toBeFloat();
});

it('normalizers attributes to their serialized representations when `serializeWithCast` is called', function (): void {
    $data = SampleWithNormalizers::fromArray([
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ])->serializeWithoutNormalizer()->serializeWithNormalizer()->toArray();

    expect($data['name'])->toBeString();
    expect($data['email'])->toBeString();
    expect($data['age'])->toBeFloat();
});

it('does not cast attributes to their serialized representations when `serializeWithoutCast` is called', function (): void {
    $data = SampleWithNormalizers::fromArray([
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ])->serializeWithoutNormalizer()->toArray();

    expect($data['name'])->toBeString();
    expect($data['email'])->toBeInstanceOf(Stringable::class);
    expect($data['age'])->toBeFloat();
});
