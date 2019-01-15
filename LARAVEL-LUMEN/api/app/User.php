<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\DB;

class User extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The PRIMARY KEY associated with the table.
     *
     * @var string
     */
    protected $primaryKey="cod_user";

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cod_user', 'login_user', 'mail_user'
    ];

    /**
     * Get the state record associated with the user.
     */
    public function state()
    {
        return $this->hasOne('App\State');
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'pass_user',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /********************************************************************
     * SQL STATEMENTS
     */

    /**
     * SELECT
     */
    public static function getUserById($id)
    {
        $sql='SELECT users.cod_user, users.login_user, users.mail_user, users.cod_state, state.nom_state FROM users, state WHERE users.cod_state=state.cod_state AND users.cod_user=?';
        return DB::select($sql,[$id]);
    }
}
