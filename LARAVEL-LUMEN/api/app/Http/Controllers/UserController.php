<?php

namespace App\Http\Controllers;

use App\User;

class ExampleController extends Controller
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

    public function test()
    {
        
    }
}
