<?php

declare(strict_types=1);

namespace BaseCodeOy\DataTransferObject\Concerns;

use Symfony\Component\Yaml\Yaml;

trait InteractsWithYaml
{
    public static function fromYaml(string $input): self
    {
        return new static(Yaml::parse($input));
    }

    public static function fromYamlFile(string $filePath): self
    {
        return new static(Yaml::parseFile($filePath));
    }

    public function toYaml(): string
    {
        return Yaml::dump($this->toArray());
    }
}
