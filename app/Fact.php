<?php

namespace App;

use App\Model as AppModel;

class Fact extends AppModel
{
    protected $table = 'facts';

    // Column name
    public const COL_CODE = 'code';
    public const COL_DESCRIPTION = 'description';
    public const COL_TYPE = 'type';
    public const COL_STATUS = 'status';

    protected $fillable = [
        self::COL_CODE,
        self::COL_DESCRIPTION,
        self::COL_TYPE,
        self::COL_STATUS,
    ];
}
