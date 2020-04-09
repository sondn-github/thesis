<?php

namespace App;

use App\Model as AppModel;

class Evaluation extends AppModel
{
    protected $table = 'evaluations';

    //Column name
    public const COL_USER_ID = 'user_id';
    public const COL_LESSON_ID = 'lesson_id';
    public const COL_ANSWERS = 'answers';

    protected $fillable = [
        self::COL_USER_ID,
        self::COL_LESSON_ID,
        self::COL_ANSWERS,
        self::COL_CREATED_AT,
        self::COL_UPDATED_AT,
        self::COL_DELETED_AT,
    ];

    //Answers
    public const REFUSAL = 1;
//    public const VERY_DISAGREEMENT = 2;
    public const DISAGREEMENT = 2;
    public const NEUTRAL = 3;
    public const AGREEMENT = 4;
//    public const VERY_AGREEMENT = 6;

    public function user() {
        return $this->belongsTo('App\User');
    }
}
