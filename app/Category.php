<?php

namespace App;

use App\Model as AppModel;

class Category extends AppModel
{
    protected $table = 'categories';

    public const COL_NAME = 'name';
}
