<?php

namespace App;

use App\Model as AppModel;

class Type extends AppModel
{
    protected $table = 'types';

    // Column name
    public const COL_NAME = 'name';
    public const COL_IS_USING = 'is_using';
    public const COL_IS_PFR = 'is_pfr';

    //Constant
    public const TYPE_ICT = 1;
    public const TYPE_DHBK_SV = 2;
    public const TYPE_GV = 3;
    public const TYPE_DHBK_GV = 4;

    protected $fillable = [
        self::COL_NAME,
        self::COL_IS_USING,
        self::COL_IS_PFR,
        self::COL_CREATED_AT,
        self::COL_UPDATED_AT,
        self::COL_DELETED_AT,
    ];

    protected $casts = [
        self::COL_IS_USING => 'boolean',
        self::COL_IS_PFR => 'boolean',
    ];

    public function criteria() {
        return $this->hasMany('App\Criteria')
            ->orderBy('code', 'asc');
    }
}
