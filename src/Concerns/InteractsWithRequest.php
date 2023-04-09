<?php

declare(strict_types=1);

namespace PreemStudio\DataTransferObject\Concerns;

use Illuminate\Http\Request;

trait InteractsWithRequest
{
    public static function fromRequest(Request $request): self
    {
        return new static($request->all());
    }
}
