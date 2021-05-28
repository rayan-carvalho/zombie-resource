<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Client;
use App\Models\Admin\Person;
use App\Models\Admin\LegalPerson;
use App\Models\Admin\PhysicalPerson;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($company_id)    {

        $clients  = Client::select('id','person_id','company_id')->where('company_id',$company_id)->get();

        $data = [];
        $i = 0;
        foreach($clients as $client){
            $person = Person::where('id',$client->person_id)->first();

            if(isset($person->physicalPerson)){
                $p = Person::select('name','phone','mobile')->where('id',$person->id)->where('company_id',$company_id)->first();
                $data[$i]['id']     = $person->client->id;
                $data[$i]['name']   = $p->name;
                $data[$i]['phone']  = $p->phone;
                $data[$i]['mobile'] = $p->mobile;

            }
            if(isset($person->legalPerson)){
                $p = Person::select('name','phone','mobile')->where('id',$person->id)->where('company_id',$company_id)->first();
                $data[$i]['id']     = $person->client->id;
                $data[$i]['name']   = $p->name;
                $data[$i]['phone']  = $p->phone;
                $data[$i]['mobile'] = $p->mobile;
            }
            if(!isset($person->legalPerson) && !isset($person->physicalPerson)){
                $p = Person::select('name','phone','mobile')->where('id',$person->id)->where('company_id',$company_id)->first();
                $data[$i]['id']     = $person->client->id;
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
