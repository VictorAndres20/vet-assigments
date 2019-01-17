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

    /**
     * Get assigments available for a date and service
     * 
     * @param Date $date Date of tghe assigments
     * @param Int $cod_service Service code for assign
     * 
     * @return Resultset All hours available
     */
    public static function timeAvailable($date,$cod_service)
    {
        $sql='SELECT count(assign.time_assign) AS quant,assign.time_assign,service.quant_hour from assign,service WHERE assign.cod_service=service.cod_service AND (assign.cod_state=1 OR assign.cod_state=3) AND assign.date_assign=? AND assign.cod_service=? GROUP BY assign.time_assign ORDER BY assign.time_assign ASC';
        $timesUsed=json_decode(json_encode(DB::select($sql,[$date,$cod_service])),true);
        $times=[];
        $pos=0;
        for($i=7;$i<=20;$i++)
        {
            if(count($timesUsed)>0)
            {
                if($timesUsed[$pos]['time_assign']==$i)
                {
                    if($timesUsed[$pos]['quant']<$timesUsed[$pos]['quant_hour'])
                    {
                        array_push($times,["time_assign"=>$i]);
                    }                
                    if($pos+1<count($timesUsed))
                    {
                        $pos++;
                    }                
                }
                else
                {
                    array_push($times,["time_assign"=>$i]);
                }                
            }
            else
            {
                array_push($times,["time_assign"=>$i]);
            }
        }
        return $times;
    } 
}