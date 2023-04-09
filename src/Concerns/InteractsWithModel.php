<?php

declare(strict_types=1);

namespace PreemStudio\DataTransferObject\Concerns;

use Illuminate\Database\Eloquent\Model;

trait InteractsWithModel
{
    public static function fromModel(Model $model): self
    {
        return new static($model->toArray());
    }

    public function toModel(string $model): Model
    {
        return new $model($this->toArray());
    }
}
