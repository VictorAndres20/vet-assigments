<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TService extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 't_service';

    /**
     * The PRIMARY KEY associated with the table.
     *
     * @var string
     */
    protected $primaryKey="cod_t_service";

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    //protected $attributes = [
    //    'attrubute' => false,
    //];

    
}
