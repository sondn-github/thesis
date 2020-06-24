<?php

namespace App;

use App\Model as AppModel;

class Role extends AppModel
{
    protected $table = 'roles';

    public const COL_NAME = 'name';
    public const COL_DISPLAY_NAME = 'display_name';
    public const COL_DESCRIPTION = 'description';

    protected $fillable = [
        self::COL_NAME,
        self::COL_DISPLAY_NAME,
        self::COL_DESCRIPTION,
        self::COL_CREATED_AT,
        self::COL_UPDATED_AT,
        self::COL_DELETED_AT,
    ];

    public function users() {
        return $this->hasMany('App\User');
    }
}
