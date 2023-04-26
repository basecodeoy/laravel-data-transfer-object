<?php

declare(strict_types=1);

namespace BombenProdukt\DataTransferObject\Concerns;

trait ReflectsAttributes
{
    public function __set(string $name, mixed $value): void
    {
        $this->{$name} = $value;
    }

    public function __get(string $name): mixed
    {
        return $this->{$name} ?? null;
    }
}
