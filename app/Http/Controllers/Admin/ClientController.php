<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Client;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ClientValidationFormRequest;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumb = json_encode([
            ["title" => "Dashboard", "url" => route('home.index')],
            ["title" => "Clientes", "url" => ""]
        ]);

        $clients = Client::select('id','name','phone','mobile')->get();

        return view('admin.clients.index',compact('clients','breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = json_encode([
            ["title" => "Dashboard", "url" => route('home.index')],
            ["title" => "Cliente", "url" => route('clients.index')],
            ["title" => "Novo Cliente", "url" => ""],
        ]);
  
        return view('admin.clients.create', ['client' => new Client()],compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientValidationFormRequest $request)
    {
            $data = $request->all();       

            $client = Client::create($data);

            if($client){
                    Alert::toast('Cadastrado com sucesso!','success');
                    return redirect ('app/clients' );
            }else{
                    Alert::error('Algo deu errado, tente novamente!','error');
                    return redirect ('app/clients' );
                }

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $breadcrumb = json_encode([
            ["title" => "Dashboard", "url" => route('home.index')],
            ["title" => "Clientes", "url" => route('clients.index')],
            ["title" => "Detalhes do Cliente", "url" => ""],
        ]);

        $client = Client::find($id);

        return view('admin.clients.show',compact('client','breadcrumb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breadcrumb = json_encode([
            ["title" => "Home", "url" => route('home.index')],
            ["title" => "Usuários", "url" => route('clients.index')],
            ["title" => "Detalhes do Usuário", "url" => route('clients.show',$id)],
            ["title" => "Editar Usuário", "url" => ""],
        ]);

        $client = Client::findOrFail($id); 

       return view('admin.clients.edit',compact('client','breadcrumb'));
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

        $client = Client::findOrFail($id);
        $data = $request->all();
        $response = $client->update($data);

        if($response){

            Alert::toast('Editado com sucesso!','success');
            return redirect ('app/clients/'.$client->id );

           }else{
            Alert::error('Algo deu errado, tente novamente!','error');
            return redirect ('app/clients/'.$client->id );
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
      
        $response = $client->delete();

        if($response){
            Alert::toast('Deletado com sucesso!','success');
            return redirect ('app/clients' );
        }else{
            Alert::error('Algo deu errado, tente novamente!','error');
            return redirect ('app/clients' );
        }
    }

}
