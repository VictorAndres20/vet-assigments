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
}