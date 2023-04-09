<?php

declare(strict_types=1);

namespace PreemStudio\DataTransferObject;

use JsonSerializable;

abstract class AbstractDataTransferObject implements JsonSerializable
{
    use Concerns\CastsAttributes;
    use Concerns\InteractsWithArray;
    use Concerns\InteractsWithCommand;
    use Concerns\InteractsWithJson;
    use Concerns\InteractsWithModel;
    use Concerns\InteractsWithRequest;
    use Concerns\InteractsWithYaml;
    use Concerns\ReflectsAttributes;
    use Concerns\ValidatesAttributes;

    public function __construct(protected readonly array $unvalidated)
    {
        $this->validateAttributes();

        $this->castAttributes();

        foreach ($this->validated as $key => $value) {
            $this->{$key} = $value;
        }
    }
}
