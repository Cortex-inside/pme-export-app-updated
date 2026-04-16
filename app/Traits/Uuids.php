<?php
/**
 * Created by PhpStorm.
 * User: guilhermedias
 * Date: 14/08/18
 * Time: 09:37
 */

namespace PMEexport\Traits;

use Illuminate\Support\Str;

trait Uuids
{

    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
}