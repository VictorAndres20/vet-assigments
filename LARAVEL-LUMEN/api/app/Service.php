<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'service';

    /**
     * The PRIMARY KEY associated with the table.
     *
     * @var string
     */
    protected $primaryKey="cod_service";

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /********************************************************************
     * SQL STATEMENTS
     */
    public static function getServicesByCity($cod_city)
    {
        $sql="SELECT service.cod_service, service.nom_service, service.desc_service, service.quant_hour, service.price_service, t_service.nom_t_service, city.nom_city, vet.nom_vet, vet.addr_vet, vet.phon_vet,vet.cod_vet FROM service,t_service, city,vet WHERE service.cod_vet=vet.cod_vet AND vet.cod_city=city.cod_city AND service.cod_t_service=t_service.cod_t_service AND service.cod_state=1 AND city.cod_city=? ORDER BY service.nom_service;";
        return DB::select($sql,[$cod_city]);
    }
}