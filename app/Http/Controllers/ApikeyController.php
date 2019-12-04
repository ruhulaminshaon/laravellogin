<?php

namespace App\Http\Controllers;

use App\Apikey;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Str;
use Validator;

class ApikeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apikey=Apikey::all();
        return view('admin.apikey.apikey',compact('apikey'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'api_name'=>'required',
            'email'=>'required|unique:apikeys',
            'password'=>'required',
        ])->validate();
        // if($validator->fails()){
        //     return response()->json($this->formatValidationErrors($validator),$this->validationErrorStatus);
        // }

        try{
            $apikey=new Apikey();
            $apikey->name=$request->api_name;
            $apikey->email=$request->email;
            $apikey->password=Hash::make($request->password);
            $apikey->api_token=Str::random(60);
            $apikey->save();
            return back()->with('message','Success');
        }catch(\Exception $e){
            return back()->with('alert',$e->getMessage);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apikey  $apikey
     * @return \Illuminate\Http\Response
     */
    public function show(Apikey $apikey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apikey  $apikey
     * @return \Illuminate\Http\Response
     */
    public function edit(Apikey $apikey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apikey  $apikey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apikey $apikey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apikey  $apikey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apikey $apikey)
    {
        //
    }
}
