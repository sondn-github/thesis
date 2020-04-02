<?php

namespace App;

use App\Model as AppModel;

class Course extends AppModel
{
    protected $table = 'courses';

    // Column name
    public const COL_NAME = 'name';
    public const COL_CATEGORY_ID = 'category_id';
    public const COL_USER_ID = 'user_id';

    protected $fillable = [
        self::COL_NAME,
        self::COL_CATEGORY_ID,
        self::COL_USER_ID,
    ];
}
