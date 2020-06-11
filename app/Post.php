<?php

namespace App;

use App\Model as AppModel;

class Post extends AppModel
{
    protected $table = 'posts';

    //Column name
    public const COL_CONTENT = 'content';
    public const COL_TITLE = 'title';
    public const COL_THUMBNAIL = 'thumbnail';
    public const COL_VIEW = 'view';
    public const COL_USER_ID = 'user_id';

    //Constant
    public const MAX_NUMBER_POST = 4;

    protected $fillable = [
        self::COL_TITLE,
        self::COL_CONTENT,
        self::COL_THUMBNAIL,
        self::COL_VIEW,
        self::COL_USER_ID,
        self::COL_CREATED_AT,
        self::COL_UPDATED_AT,
        self::COL_DELETED_AT,
    ];

    protected $attributes = [
        self::COL_THUMBNAIL => '/images/news.jpeg',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
