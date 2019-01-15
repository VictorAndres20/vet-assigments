<?php

namespace App\Http\Controllers;

use App\Client;

class ClientController extends Controller
{
    public function create()
    {
        $id=-1;
        $data="Error";
        $resCode=500;
        $inputs=json_decode(file_get_contents('php://input'),true);
        $exist=Client::where('phon_client',$inputs['phon_client'])->get();
        if(count($exist)>0)
        {
            $data=$exist;
            $resCode=400;
        }
        else
        {
            $client=new Client();
            $client->nom_client=$inputs['nom_client'];
            $client->phon_client=$inputs['phon_client'];
            $client->addr_client=$inputs['addr_client'];
            if($client->save())
            {
                $id=1;
                $data=Client::where('phon_client',$inputs['phon_client'])->get();
                $resCode=201;
            }   
        }

        return response()->json(["id"=>$id,"data"=>$data],$resCode);
    }
}
