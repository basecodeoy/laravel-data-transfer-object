<?php

declare(strict_types=1);

namespace PreemStudio\DataTransferObject\Concerns;

use PreemStudio\DataTransferObject\Contracts\Normalizer;

trait CastsAttributes
{
    protected bool $serializeWithCast = true;

    public function serializeWithNormalizer(): static
    {
        $this->serializeWithCast = true;

        return $this;
    }

    public function serializeWithoutNormalizer(): static
    {
        $this->serializeWithCast = false;

        return $this;
    }

    /**
     * @return Normalizer[]
     */
    public function normalizers(): array
    {
        return [];
    }

    protected function castAttributes(): void
    {
        foreach ($this->normalizers() as $property => $caster) {
            $this->validated[$property] = $caster->deserialize($this, $property, $this->validated[$property]);
        }
    }
}
