<?php

namespace App\Http\Controllers;

use App\User;
use App\State;
use Illuminate\Http\Request;

class UserController extends Controller
{
	/** 
	 * Get user by id
	 * 
	 * @param Integer $id User id to be getted 
	 */
    public function getUserById($id)
    {
		/**
		 * With Eloquent TESTS
		 */
		/** Get only user by ID */
		//$user=User::find($id);
		//return $user->toJson();

		/** Get user with his state */
		//$user=User::with(['state'])->find($id);
		//$state=$user->state();
		//$data=['user'=>$user,'state'=>$state];
		//return response()->json($data);		

		/** 
		 * Using SQL Statements
		 */
		
		return response()->json(["id"=>1,"data"=>User::getUserById($id)],200);

	}
	
	public function create(Request $request)
	{
		$id=-1;
		$data='Error';
		$inputs=json_decode(file_get_contents('php://input'),true);
		$exist=User::where('login_user',$inputs['login'])->get();
		if(count($exist)>0)
		{
			$data="Ya existe el usuario";
		}
		else
		{
			$user=new User();
			$user->login_user=$inputs['login'];
			$user->pass_user=hash('sha256',md5($inputs['pass']));
			$user->mail_user=$inputs['mail'];
			$user->cod_state=1;
			if($user->save())
			{
				$id=1;
				$data='Realizado';
			}
		}
		
		return response()->json(["id"=>$id,"data"=>$data],201);
	}
}
