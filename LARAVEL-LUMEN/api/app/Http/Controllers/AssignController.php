<?php

namespace App\Http\Controllers;

use App\Pet;
use App\Service;
use App\Assigment;
use \Illuminate\Http\Request;

class AssignController extends Controller
{
    public function create()
    {
        $id=-1;
        $data="Error";
        $resCode=500;
        $inputs=json_decode(file_get_contents('php://input'),true);
        $service=Service::find($inputs['cod_service']);
        $quant=$service->quant_hour;
        $assigns=Assigment::where('cod_service',$inputs['cod_service'])->where('date_assign',$inputs['date_assign'])->get();
        if(count($assigns)==$quant)
        {
            $data="Lleno";
        }
        else
        {
            /** NEED SQL OR state 1 or state 3 
             * 
            */
            $petassign=Assigment::where('cod_state',3)->where('cod_service',$inputs['cod_service'])->where('cod_pet',$inputs['cod_pet'])->where('date_assign',$inputs['date_assign'])->get();
            /** */
            if(count($petassign)>0)
            {
                $data="Ya ha sido asignado tu mascota para este servicio";
            }
            else
            {
                $assign=new Assigment();
                $assign->cod_pet=$inputs['cod_pet'];
                $assign->cod_service=$inputs['cod_service'];
                $assign->cod_state=3;
                $assign->date_assign=$inputs['date_assign'];
                if($assign->save())
                {
                    $id=1;
                    $data="Asignación realizada, esperando confirmación";
                    $resCode=201;
                }
            }
        }
        return response()->json(["id"=>$id,"data"=>$data],$resCode);
    }
}
