<?php

declare(strict_types=1);

namespace BaseCodeOy\DataTransferObject\Concerns;

trait InteractsWithJson
{
    public static function fromJson(string $input): self
    {
        return new static(\json_decode($input, true, 512, \JSON_THROW_ON_ERROR));
    }

    public static function fromJsonFile(string $filePath): self
    {
        return self::fromJson(\file_get_contents($filePath));
    }

    public function toJson(bool $pretty = false): string
    {
        if ($pretty) {
            return \json_encode($this->toArray(), \JSON_PRETTY_PRINT);
        }

        return \json_encode($this->toArray());
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
