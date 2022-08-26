<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Api;
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('hotel.create');
    }

    public function store(Request $request)
    {
        $token = session()->get('user')->access_token;

        $params =   [

            'headers' =>[
                        'Authorization'=>"Bearer $token"
                        ],

            'form_params' => [
                                'name' => $request->name,
                                'city' => $request->city,
                                'address' => $request->address,
                                'nit' => $request->nit,
                                'max_rooms' => $request->max_rooms,
                                'user_created_id'=>session()->get('user')->user->id
                            ]
            ];

        $data = new Api('POST','store/hotel',$params);

        $message = $data->apiResource();

        return redirect()->route('home')->with('notification',$message->message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $token = session()->get('user')->access_token;

        $params =   [

            'headers' =>[
                        'Authorization'=>"Bearer $token"
                        ]
            ];

        $data = new Api('GET',"show/$id/hotel",$params);

        $hotel = $data->apiResource();

        return view('hotel.edit')->with(compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $token = session()->get('user')->access_token;

        $params =   [

            'headers' =>[
                        'Authorization'=>"Bearer $token"
                        ],

            'form_params' => [
                                'name' => $request->name,
                                'city' => $request->city,
                                'address' => $request->address,
                                'nit' => $request->nit,
                                'max_rooms' => $request->max_rooms,
                                'user_created_id'=>session()->get('user')->user->id
                            ]
            ];

        $data = new Api('PUT',"update/$id/hotel",$params);

        $message = $data->apiResource();

        return redirect()->route('home')->with('notification',$message->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $token = session()->get('user')->access_token;

        $params =   [

            'headers' =>[
                        'Authorization'=>"Bearer $token"
                        ]
            ];

        $data = new Api("DELETE","destroy/$id/hotel",$params);

        $message = $data->apiResource();

        return redirect()->route('home')->with('notification',$message->message);
    }

    public function showWithRooms($id)
    {
        $token = session()->get('user')->access_token;
        $params =   [
            'headers' =>[
                            'Authorization'=>"Bearer $token"
                        ]
            ];
            $data = new Api('GET',"all/$id/hotelWithRooms",$params);
            $hotels = $data->apiResource();
            $hotel = $hotels->hotel;
            $rooms = $hotels->hotelWithRooms;

            $estandar = [];
            $junior = [];
            $suite = [];
            foreach ($rooms as $r) {

                switch ($r->type_room_id) {
                    case 1:
                        array_push($estandar,$r->type_room_id);
                    break;
                    case 2:
                        array_push($junior,$r->type_room_id);
                    break;
                    case 3:
                        array_push($suite,$r->type_room_id);
                    break;


                }
            }

            $countTypeRoom = [
                'estandar'=>count($estandar),
                'junior'=>count($junior),
                'suite'=>count($suite)
            ];
            if (empty($hotel)) {
                return view('hotel.rooms_hotel')->with(compact('hotel','rooms','countTypeRoom'));
            }

            return view('hotel.rooms_hotel')->with(compact('hotel','rooms','countTypeRoom'));
    }
}
