<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Vet extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vet';

    /**
     * The PRIMARY KEY associated with the table.
     *
     * @var string
     */
    protected $primaryKey="cod_vet";

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /********************************************************************
     * SQL STATEMENTS
     */

     public static function getVetsByCity($cod_city)
     {
         $sql='SELECT vet.cod_vet, vet.nom_vet, vet.addr_vet, vet.phon_vet, vet.cod_user, city.nom_city FROM vet, city WHERE vet.cod_city=city.cod_city AND vet.cod_state=1 AND vet.cod_city=?';
         return DB::select($sql,[$cod_city]);
     }
}