<?php

namespace App\Http\Controllers;

use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Helpers\Api;
class LoginController extends Controller
{

   public function login(Request $request){

    $params =   [
                'form_params' => [
                                    'email' => $request->email,
                                    'password' => $request->password
                                ]
                ];

    $data = new Api('POST','login',$params);

    $user = $data->apiResource();

    session(['user' =>$user]);

            return redirect()->route('home');
   }

   public function logout()
   {
        // $token = session()->get('user')->access_token;
        // $params =   [
        // 'headers' =>[
        //                 'Authorization'=>"Bearer $token"
        //             ]
        // ];
        // $data = new Api('GET','all/hotel',$params);
        // $data->apiResource();

        session()->forget('user');
        return view('welcome');
   }

}
