<?php

namespace App;

use App\Model as AppModel;

class Knowledge extends AppModel
{
    protected $table = "knowledge";

    // Column name
    public const COL_CODE = 'code';
    public const COL_PREMISE = 'premise';
    public const COL_CONCLUSION = 'conclusion';
    public const COL_RELIABILITY = 'reliability';
    public const COL_TYPE = 'type';
    public const COL_STATUS = 'status';

    protected $fillable = [
        self::COL_CODE,
        self::COL_PREMISE,
        self::COL_CONCLUSION,
        self::COL_RELIABILITY,
        self::COL_TYPE,
        self::COL_STATUS,
    ];

    // Constant
    public const MIN_RELIABILITY = 0.7;
    public const OPERATORS = ['>=', '<=', '>', '<'];
    public const TYPE_1 = 1;
    public const TYPE_2 = 2;

    protected $casts = [
        self::COL_PREMISE => 'array',
        self::COL_STATUS => 'boolean',
    ];
}
