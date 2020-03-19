<?php

namespace App;

use App\Model as AppModel;

class Lesson extends AppModel
{
    protected $table = 'lessons';

    protected $fillable = [
        self::COL_NAME,
        self::COL_CATEGORY_ID,
        self::COL_DESCRIPTION,
        self::COL_FILE,
        self::COL_THUMBNAIL,
        self::COL_USER_ID,
        self::COL_CREATED_AT,
        self::COL_UPDATED_AT,
        self::COL_DELETED_AT,
    ];

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
    public const COL_STATUS = 'status';

    public const ACTIVE_STATUS = 1;
    public const INACTIVE_STATUS = 0;

    protected $attributes = [
        self::COL_THUMBNAIL => '/images/course_2.jpg',
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
