<?php

namespace App;

use App\Model as AppModel;

class Evaluation extends AppModel
{
    protected $table = 'evaluations';

    //Column name
    public const COL_USER_ID = 'user_id';
    public const COL_COURSE_ID = 'course_id';
    public const COL_ANSWERS = 'answers';

    protected $fillable = [
        self::COL_USER_ID,
        self::COL_COURSE_ID,
        self::COL_ANSWERS,
        self::COL_CREATED_AT,
        self::COL_UPDATED_AT,
        self::COL_DELETED_AT,
    ];

    protected $casts = [
        self::COL_ANSWERS => 'array',
    ];

    //Answers
    public const REFUSAL = 1;
    public const DISAGREEMENT = 2;
    public const NEUTRAL = 3;
    public const AGREEMENT = 4;
    public const BASICALLY_AGREEMENT = 5;
    public const VERY_AGREEMENT = 6;
    public const VERY_DISAGREEMENT = 7;


    public function user() {
        return $this->belongsTo('App\User');
    }
}
