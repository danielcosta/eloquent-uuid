<?php

namespace DCST\Database\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

abstract class UUIDEloquentModel extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        /**
         * Attach to the 'creating' Model Event to provide a UUID
         * for the `id` field (provided by $model->getKeyName())
         */
        static::creating(
            function (UUIDEloquentModel $model) {
                if (empty($model->{$model->getKeyName()})) {
                    $model->{$model->getKeyName()} = (string) $model->generateUuid();
                }
            }
        );
    }

    /**
     * Get a new version 4 (random) UUID.
     *
     * @return Uuid
     */
    private function generateUuid()
    {
        return Uuid::uuid4();
    }
}
