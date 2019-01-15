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
}