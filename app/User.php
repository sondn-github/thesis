<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
        'role_id',
        self::COL_SPECIALTY,
        self::COL_LEVEL,
        self::COL_AVATAR,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
     * The name of column
     * */
    public const COL_ID = 'id';
    public const COL_NAME = 'name';
    public const COL_EMAIL = 'email';
    public const COL_BIRTHDAY = 'birthday';
    public const COL_ROLE_ID = 'role_id';
    public const COL_RELIABILITY = 'reliability';
    public const COL_SPECIALTY = 'specialty';
    public const COL_LEVEL = 'level';
    public const COL_AVATAR = 'avatar';
    public const COL_STATUS = 'status';
    public const COL_PASSWORD = 'password';

    public function role() {
        return $this->belongsTo('App\Role');
    }
}
