<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns;

use Illuminate\Http\Request;
use Mockery;
use Tests\Fixtures\SampleDataTransferObject;

it('creates a data transfer object from a request', function (): void {
    $data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 30,
    ];

    $request = Mockery::mock(Request::class);
    $request->shouldReceive('all')->andReturn($data);

    $dto = SampleDataTransferObject::fromRequest($request);

    expect($dto->toArray())->toBe($data);
});
