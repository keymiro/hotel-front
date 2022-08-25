<?php

namespace App\Http\Controllers;

use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use GuzzleHttp\Client as Client;
class LoginController extends Controller
{
   public function login(Request $request){

    $client = new Client([
        'base_uri' =>  env('API_ENDPOINT'),
        'timeout'  => 2.0,
        ]);

       $response = $client->request('POST','login',
       [
            'form_params' =>  [
                        'email' => $request->email,
                        'password' => $request->password
                       ]
       ]);

        $user = json_decode($response->getBody()->getContents());
        // dump($user->message);die();

          session(['user' =>$user]);
        //   return $request->session()->get('user');
        //eliminar session()->forget('user');.
        // validar si existe session()->has('user');

       if (session()->has('user')) {
        # code...
       }


        return view('dashboard');
   }


}
