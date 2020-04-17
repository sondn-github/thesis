<?php

namespace App;

use App\Model as AppModel;

class Type extends AppModel
{
    protected $table = 'types';

    // Column name
    public const COL_NAME = 'name';
    public const COL_IS_USING = 'is_using';

    protected $fillable = [
        self::COL_NAME,
        self::COL_IS_USING,
        self::COL_CREATED_AT,
        self::COL_UPDATED_AT,
        self::COL_DELETED_AT,
    ];

    protected $casts = [
        self::COL_IS_USING => 'boolean',
    ];
}
