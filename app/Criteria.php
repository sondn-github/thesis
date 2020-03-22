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

    protected $fillable = [
        self::COL_NAME,
        self::COL_DESCRIPTION,
        self::COL_EXAMPLE,
        self::COL_EXPLAIN,
    ];
}
