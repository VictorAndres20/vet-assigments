<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Assigment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'assign';

    /**
     * The PRIMARY KEY associated with the table.
     *
     * @var string
     */
    protected $primaryKey="cod_assign";

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /********************************************************************
     * SQL STATEMENTS
     */

    /**
     * Verify if a pet has scheduled yet
     * 
     * @param Int $cod_service Service cod
     * @param Int $cod_pet Pet cod
     * @param Date $date Date for the service
     * @param Time $time Time H:M:S of the assign
     * 
     * @return Resulset 
     */
    public static function getPreviousAssigment($cod_service,$cod_pet,$date,$time)
    {
        $sql="SELECT * from assign WHERE (cod_state=1 OR cod_state=3) AND cod_service=? AND cod_pet=? AND date_assign=? AND time_assign=?";
        return DB::select($sql,[$cod_service,$cod_pet,$date,$time]);
    }
}