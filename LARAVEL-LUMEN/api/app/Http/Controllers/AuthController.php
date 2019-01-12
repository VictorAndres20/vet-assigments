<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public function login(Request $request)
    {
        /** Validate inpits */
        $this->validate($request, [
            //'email'    => 'required|email|max:255', use this if you are loggin by email
            'login' => 'required',
            'pass' => 'required',
        ]);

        try {
            /** Encrypt pass with your method */
            $pass=hash('sha256',md5(md5($request->input('pass'))));
            $data=
            [
                /** Column on DB login_user */
                "login_user"=>$request->input('login'),
                /** Column on DB pass_user */
                "pass_user"=>$pass
            ];
            //return $data;
            if (! $token = $this->jwt->attempt($data))
            {
                return response()->json(['id'=>-1,'error'=>'Credenciales incorrectas'], 404);
            }

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['id'=>-1,'error'=>'token_expired'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['id'=>-1,'error'=>'token_invalid'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['id'=>-1,'error'=>'Error fatal','token_absent' => $e->getMessage()], 500);

        }

        return response()->json(['id'=>1,'token'=>$token]);
    }

    public function getSession(Request $request)
    {
        return response()->json(['id'=>1,'me'=>$request->auth->login_user,'data'=>[$request->auth]]);
    }
}