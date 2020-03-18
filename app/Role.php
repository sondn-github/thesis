<?php

namespace App;

use App\Model as AppModel;

class Role extends AppModel
{
    protected $table = 'roles';

    public const COL_NAME = 'name';
    public const COL_DISPLAY_NAME = 'display_name';
    public const COL_DESCRIPTION = 'description';
}
