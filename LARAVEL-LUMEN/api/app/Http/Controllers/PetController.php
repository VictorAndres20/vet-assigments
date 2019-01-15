<?php

namespace App\Http\Controllers;

use App\Pet;
use App\Client;

class PetController extends Controller
{
    public function create()
    {
        $id=-1;
        $data="Error";
        $resCode=500;
        $inputs=json_decode(file_get_contents('php://input'),true);
        $existP=Pet::where('nom_pet',$inputs['nom_pet'])->get();
        if(count($existP)>0)
        {
            $data="Macota ya existe";
            $resCode=400;
        }
        else
        {
            $pet=new Pet();
            $pet->nom_pet=$inputs['nom_pet'];
            $pet->cod_client=$inputs['cod_client'];
            if($pet->save())
            {
                $id=1;
                $data="Macota registrada";
                $resCode=201;
            }   
        }

        return response()->json(["id"=>$id,"data"=>$data],$resCode);
    }

    public function getByClient($cod_client)
    {
        $pets=Pet::where('cod_client',$cod_client)->get();
        return response()->json(["id"=>1,"data"=>$pets->toArray()]);
    }
}
