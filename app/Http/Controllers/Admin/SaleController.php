<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Client;
use App\Models\Admin\Sale;
use App\Models\Admin\Resource;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\SaleValidationFormRequest;

class SaleController extends Controller
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
            ["title" => "Saída de Recursos", "url" => ""]
        ]);
        
        $resources = Resource::select('resources.id','resources.image','resources.name','categories.name as category','resources.amount')
        ->join('categories', 'categories.id', '=', 'resources.category_id')                               
        ->get();


        return view('admin.sales.index',compact('resources','breadcrumb'));
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
            ["title" => "Saída de Recursos", "url" => route('sales.index')],
            ["title" => "Nova Saída de Recursos", "url" => ""],
        ]);

        $resources   = Resource::all();
        $clients   = Client::all();
       
        return view('admin.sales.create', ['sale' => new Sale()],compact('breadcrumb','resources','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleValidationFormRequest $request)
    {        
       
        $data = $request->all();
        $resource = Resource::where('id',$data['resource_id'])->first(); 
        if($data['amount'] > $resource->amount){
            Alert::toast("Quantidade maior que a disponível em estoque($resource->amount)","warning");
            return redirect ('app/sales/create' );
        }else{
            $sale = Sale::create($data);
        }
       
        if($sale){
            $resource->amount = $resource->amount - $sale->amount;
            $resource->save();
            Alert::toast('Cadastrado com sucesso!','success');
            return redirect ('app/sales' );
        }else{
            Alert::error('Algo deu errado, tente novamente!','error');
            return redirect ('app/sales' );
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
        $resource = Resource::where('id',$id)->first();
        $sales     =  $resource->sales;

        $breadcrumb = json_encode([
            ["title" => "Dashboard", "url" => route('home.index')],
            ["title" => "Saída de Recursos", "url" => route('sales.index')],
            ["title" => "Detalhes da Saída de Recursos", "url" => ""],
        ]);

        return view('admin.sales.show',compact('sales','breadcrumb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::where('id',$id)->first();    

        $resources = Resource::all();
        $clients   = Client::all();

        $breadcrumb = json_encode([
            ["title" => "Home", "url" => route('home.index')],
            ["title" => "Saída de Recursos", "url" => route('sales.index')],
            ["title" => "Detalhes da Saída", "url" => route('sales.show',$id)],
            ["title" => "Editar Saída", "url" => ""],
        ]);      

       return view('admin.sales.edit',compact('resources','sale','clients','breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaleValidationFormRequest $request, $id)
    {
        $data  =  $request->all();         
        $sale = Sale::where('id',$id)->first();
        $oldAmount = $sale->amount;
        $resource =  $sale->resource;
        if($data['amount'] > $resource->amount){
            Alert::toast("Quantidade maior que a disponível em estoque($resource->amount)","warning");
            return redirect ('app/sales/create' );
        }else{
            $response = $sale->update($data);
        }          
              

        if($response){   
            $total = 0;
            foreach( $resource->sales as  $sale){
                $total = $total + $sale->amount;
            }     
            $resource->amount = $resource->amount - $total + $oldAmount;
            $resource->save();         

            Alert::toast('Editado com sucesso!','success');
            return redirect ('app/sales/'.$resource->id );
           }else{
            Alert::error('Algo deu errado, tente novamente!','error');
            return redirect ('app/sales/'.$resource->id );
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
        $sale = Sale::where('id',$id)->first();       
        $oldAmount = $sale->amount;
        $resource = $sale->resource;
        $response = $sale->delete();

        if($response){
                
            $resource->amount = $resource->amount + $oldAmount;
            $resource->save();  
            Alert::toast('Deletado com sucesso!','success');
            return redirect ('app/sales' );
        }else{
            Alert::error('Algo deu errado, tente novamente!','error');
            return redirect ('app/sales' );
        }
    }
}
