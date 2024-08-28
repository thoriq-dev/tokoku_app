<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UuidTrait
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->incrementing = false;
            $model->keyType = 'string';
            $model->{$model->getKeyName()} = Str::orderedUuid();
        });
    }
    public function getIncrementing(): bool
    {
        return false;
    }
    public function getKeyType(): string
    {
        return 'string';
    }
}
