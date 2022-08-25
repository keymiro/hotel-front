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
        session()->forget('user');
        return view('welcome');
   }

   public function home()
   {
    $token = session()->get('user')->access_token;
    $params =   [
        'headers' =>[
                        'Authorization'=>"Bearer $token"
                    ]
        ];
        $data = new Api('GET','all/hotel',$params);
        $hotels = $data->apiResource();
        return view('dashboard')->with(compact('hotels'));
   }


}
