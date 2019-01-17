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
        
        $petassign=Assigment::getPreviousAssigment($inputs['cod_service'],$inputs['cod_pet'],$inputs['date_assign'],$inputs['time_assign']);
        /** */
        if(count($petassign)>0)
        {
            $data="Ya has enviado solicitud para tu mascota en este servicio";
            $resCode=400;
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
        
        return response()->json(["id"=>$id,"data"=>$data],$resCode);
    }

    public function modifyState($cod_assign)
    {
        $id=-1;
        $data="Error";
        $resCode=500;
        $inputs=json_decode(file_get_contents('php://input'),true);
        $assign=Assigment::find($cod_assign);
        $actualState=$assign->cod_state;
        if($actualState==5 || $actualState==4 || $actualState==2)
        {
            $data="La asignación se encuentra eliminada o completada, no se puede modificar de nuevo";
            $resCode=400;
        }
        else
        {
            $assign->cod_state=$inputs['cod_state'];
            if($assign->save())
            {
                $id=1;
                $data="Realizado";
                $resCode=202;
            }
        }        
        return response()->json(["id"=>$id,"data"=>$data],$resCode);
    }

    public function timeAvailable($date,$cod_service)
    {
        return response()->json(["id"=>1,"data"=>Assigment::timeAvailable($date,$cod_service)],200);
    }
}
