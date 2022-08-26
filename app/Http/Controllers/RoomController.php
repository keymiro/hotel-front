<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Api;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('room.create')->with(compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token = session()->get('user')->access_token;

        $params =   [

            'headers' =>[
                        'Authorization'=>"Bearer $token"
                        ],

            'form_params' => [
                                'number' => $request->number,
                                'amount' => $request->amount,
                                'address' => $request->address,
                                'type_room_id' => $request->type_room_id,
                                'hotel_id' => $request->hotel_id,
                                'user_created_id'=>session()->get('user')->user->id
                            ]
            ];

        $data = new Api('POST','store/room',$params);

        $message = $data->apiResource();

        return back()->with('notification',$message->message);
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

        $data = new Api('GET',"show/$id/room",$params);

        $room = $data->apiResource();


        return view('room.edit')->with(compact('room'));
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
                                'number' => $request->number,
                                'amount' => $request->amount,
                                'accommodations' =>$request->accommodations,
                                'address' => $request->address,
                                'type_room_id' => $request->type_room_id,
                                'hotel_id' => $request->hotel_id,
                                'user_created_id'=>session()->get('user')->user->id
                            ]
            ];

        $data = new Api('PUT',"update/$id/room",$params);

        $message = $data->apiResource();

        return back()->with('notification',$message->message);
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

        $data = new Api("DELETE","destroy/$id/room",$params);

        $message = $data->apiResource();

        return back()->with('notification',$message->message);
    }
}
