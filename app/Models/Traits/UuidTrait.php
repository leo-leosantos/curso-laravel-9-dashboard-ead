<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;


trait UuidTrait
 {
    public static function booted()
    {
        static::created(function(Model $model) {
            $model->id = Str::uuid();
        });
    }

}
