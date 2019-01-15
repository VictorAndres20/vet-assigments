<?php

namespace App\Http\Controllers;

use App\City;

class CityController extends Controller
{
    public function create()
    {
        $id=-1;
        $data="Error";
        $resCode=500;
        $inputs=json_decode(file_get_contents('php://input'),true);
        $exist=City::where('nom_city',$inputs['nom_city'])->get();
        if($exist->cod_city)
        {
            $data="Ciudad ya existe";
            $resCode=400;
        }
        else
        {
            $city=new City();
            $city->nom_city=$inputs['nom_city'];
            if($city->save())
            {
                $id=1;
                $data="Realizado";
                $resCode=201;
            }
        }        
        return response()->json(["id"=>$id,"data"=>$data],$resCode);
    } 
}
