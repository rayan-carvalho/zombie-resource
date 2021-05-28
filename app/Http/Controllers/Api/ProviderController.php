<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Provider;
use App\Models\Admin\Person;


class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers  = Provider::all();

        $data = [];
        $i = 0;
        foreach($providers as $provider){
            $person = Person::where('id',$provider->person_id)->first();


            if(isset($person->physicalPerson)){
                $p = Person::select('name','phone','mobile')->where('id',$person->id)->first();
                $data[$i]['id']     = $person->provider->id;
                $data[$i]['name']   = $p->name;
                $data[$i]['phone']  = $p->phone;
                $data[$i]['mobile'] = $p->mobile;
            }
            if(isset($person->legalPerson)){
                $p = Person::select('name','phone','mobile')->where('id',$person->id)->first();
                $data[$i]['id']     = $person->provider->id;
                $data[$i]['name']   = $p->name;
                $data[$i]['phone']  = $p->phone;
                $data[$i]['mobile'] = $p->mobile;
            }
            if(!isset($person->legalPerson) && !isset($person->physicalPerson)){
                $p = Person::select('name','phone','mobile')->where('id',$person->id)->first();
                $data[$i]['id']     = $person->provider->id;
                $data[$i]['name']   = $p->name;
                $data[$i]['phone']  = $p->phone;
                $data[$i]['mobile'] = $p->mobile;
            }

            $i++;



        }


        return response()->json($data,200);



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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
