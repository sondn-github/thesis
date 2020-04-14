<?php

namespace App;

use App\Model as AppModel;

class Criteria extends AppModel
{
    protected $table = 'criterias';

    //Column name
    public const COL_NAME = 'name';
    public const COL_DESCRIPTION = 'description';
    public const COL_EXPLAIN = 'explain';
    public const COL_EXAMPLE = 'example';
    public const COL_WEIGHT = 'weight';
    public const COL_STATUS = 'status';

    protected $fillable = [
        self::COL_NAME,
        self::COL_DESCRIPTION,
        self::COL_EXAMPLE,
        self::COL_EXPLAIN,
        self::COL_WEIGHT,
        self::COL_STATUS,
        self::COL_CREATED_AT,
        self::COL_UPDATED_AT,
        self::COL_DELETED_AT,
    ];
}
