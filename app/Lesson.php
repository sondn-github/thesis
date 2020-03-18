<?php

namespace App;

use App\Model as AppModel;

class Lesson extends AppModel
{
    protected $table = 'lessons';

    /*
     * The name of column
     * */
    public const COL_NAME = 'name';
    public const COL_CATEGORY_ID = 'category_id';
    public const COL_DESCRIPTION = 'description';
    public const COL_FILE = 'file';
    public const COL_THUMBNAIL = 'thumbnail';
    public const COL_VIEW = 'view';
    public const COL_USER_ID = 'user_id';
}
