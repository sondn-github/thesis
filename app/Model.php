<?php


namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends EloquentModel
{
    use SoftDeletes;

    public $timestamps = true;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /*
     * The name of column
     * */
    public const COL_ID = 'id';
    public const COL_CREATED_AT = 'created_at';
    public const COL_UPDATED_AT = 'updated_at';
    public const COL_DELETED_AT = 'deleted_at';

    /*Constant*/
    public const ACTIVE_STATUS = 1;
    public const INACTIVE_STATUS = 0;
}
