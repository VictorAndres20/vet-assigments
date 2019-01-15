<?php

namespace App\Http\Controllers;

use App\Vet;
use Illuminate\Http\Request;

class VetController extends Controller
{
    public function create(Request $request)
    {
        $id=-1;
        $data="Error";
        $resCode=500;
        $inputs=json_decode(file_get_contents('php://input'),true);
        $exist=Vet::where('nom_vet',$inputs['nom_vet'])->get();
        if(count($exist)>0)
        {
            $data="Veterinaria ya existe";
            $resCode=400;
        }
        else
        {
            $vet=new Vet();
            $vet->nom_vet=$inputs['nom_vet'];
            $vet->addr_vet=$inputs['addr_vet'];
            $vet->phon_vet=$inputs['phon_vet'];
            $vet->cod_city=$inputs['cod_city'];
            $vet->cod_user=$request->auth->user()->cod_user;
            $vet->cod_state=1;
            if($vet->save())
            {
                $id=1;
                $data="Veterinaria registrada";
                $resCode=201;
            }            
        }
        return response()->json(["id"=>$id,"data"=>$data],$resCode);
    }
}
