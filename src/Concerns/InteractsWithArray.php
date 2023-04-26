<?php

declare(strict_types=1);

namespace BombenProdukt\DataTransferObject\Concerns;

trait InteractsWithArray
{
    public static function fromArray(array $array): self
    {
        return new static($array);
    }

    public function toArray(): array
    {
        $normalizers = $this->normalizers();

        if (empty($normalizers)) {
            return $this->validated;
        }

        if (!$this->serializeWithCast) {
            return $this->validated;
        }

        $result = $this->validated;

        foreach ($normalizers as $property => $caster) {
            $result[$property] = $caster->serialize($this, $property, $result[$property]);
        }

        return $result;
    }
}
