<?php

namespace App\Http\Controllers;

use App\TService;
use App\Service;
use \Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
	* The request instance.
	*
	* @var \Illuminate\Http\Request
	*/
	private $request;

	/**
	* Create a new controller instance.
	* 
	* @param  \Illuminate\Http\Request  $request
	*
	* @return void
	*/
	public function __construct(Request $request){
		$this->request = $request;
    }

    /**
     * Create a new Service Type
     * 
     * @return JSON
     */
    public function createT(Request $request)
    {
        $id=-1;
        $data='No realizado';
        /** Insert with ORM Eloquent */
        $tservice=new TService;
        $tservice->nom_t_service=$request->input('nom_t_service');
        if($tservice->save())
        {
            $id=1;
            $data="Realizado";
        }
        return response()->json(['id'=>$id,'data'=>$data],201);
    }

    public function create()
    {
        $id=-1;
        $data="Error";
        $resCode=500;
        $inputs=json_decode(file_get_contents('php://input'),true);
        $exist=Service::where('nom_service',$inputs['nom_service'])->where('cod_vet',$inputs['cod_vet'])->get();
        if(count($exist)>0)
        {
            $data="El servicio ya está registrado";
            $resCode=400;
        }
        else
        {
            $service=new Service();
            $service->nom_service=$inputs['nom_service'];
            $service->desc_service=$inputs['desc_service'];
            $service->quant_hour=$inputs['quant_hour'];
            $service->price_service=$inputs['price_service'];
            $service->cod_vet=$inputs['cod_vet'];
            $service->cod_t_service=$inputs['cod_t_service'];
            $service->cod_state=1;
            if($service->save())
            {
                $id=1;
                $data="Servicio registrado";
                $resCode=201;
            }
        }
        return response()->json(["id"=>$id,"data"=>$data],$resCode);
    }

    public function getServicesByVet($cod_vet)
    {
        $services=Service::where('cod_vet',$cod_vet)->get();
        return response()->json(["id"=>1,"data"=>$services->toArray()],200);
    }

    public function getServicesByCity($cod_city)
    {
        return response()->json(["id"=>1,"data"=>Service::getServicesByCity($cod_city)],200);
    }
}
