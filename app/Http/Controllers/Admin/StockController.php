<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Stock;
use App\Models\Admin\Resource;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StockValidationFormRequest;

class StockController extends Controller
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
            ["title" => "Entrada de Recursos", "url" => ""]
        ]);
        
        $resources = Resource::select('resources.id','resources.image','resources.name','categories.name as category','resources.amount')
        ->join('categories', 'categories.id', '=', 'resources.category_id')                               
        ->get();


        return view('admin.stocks.index',compact('resources','breadcrumb'));
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
            ["title" => "Entrada de Recursos", "url" => route('stocks.index')],
            ["title" => "Nova Entrada de Recursos", "url" => ""],
        ]);

        $resources   = Resource::all();
       

        return view('admin.stocks.create', ['stock' => new Stock()],compact('breadcrumb','resources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockValidationFormRequest $request)
    {        
       
        $data = $request->all();
  
        $stock = Stock::create($data);

        if($stock){
            $resource = Resource::where('id',$stock->resource_id)->first();  
            $resource->amount = $resource->amount + $stock->amount;
            $resource->save();
        }
       
        if($stock){
            Alert::toast('Cadastrado com sucesso!','success');
            return redirect ('app/stocks' );
        }else{
            Alert::error('Algo deu errado, tente novamente!','error');
            return redirect ('app/stocks' );
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
        $stocks =  $resource->stocks;

        $breadcrumb = json_encode([
            ["title" => "Dashboard", "url" => route('home.index')],
            ["title" => "Entrada de Recursos", "url" => route('stocks.index')],
            ["title" => "Detalhes da Entrada de Recursos", "url" => ""],
        ]);

        return view('admin.stocks.show',compact('stocks','breadcrumb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::where('id',$id)->first();    

        $resources = Resource::all();

        $breadcrumb = json_encode([
            ["title" => "Home", "url" => route('home.index')],
            ["title" => "Entrada de Recursos", "url" => route('stocks.index')],
            ["title" => "Detalhes da Entrada", "url" => route('stocks.show',$id)],
            ["title" => "Editar Entrada", "url" => ""],
        ]);      

       return view('admin.stocks.edit',compact('resources','stock','breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StockValidationFormRequest $request, $id)
    {
        $data  =  $request->all(); 
        $stock = Stock::where('id',$id)->first();           
        $response = $stock->update($data);
        $resource = $stock->resource;


        if($response){   
            $total = 0;
            foreach( $resource->stocks as  $stock){
                $total = $total + $stock->amount;
            }     
            $resource->amount = $total;
            $resource->save();         
            Alert::toast('Editado com sucesso!','success');
            return redirect ('app/stocks/'.$resource->id );
           }else{
            Alert::error('Algo deu errado, tente novamente!','error');
            return redirect ('app/stocks/'.$resource->id );
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
        $stock = Stock::where('id',$id)->first();       
        $resource = $stock->resource;
        $response = $stock->delete();

        if($response){
            $total = 0;
            foreach( $resource->stocks as  $stock){
                $total = $total + $stock->amount;
            }     
            $resource->amount = $total;
            $resource->save();  
            Alert::toast('Deletado com sucesso!','success');
            return redirect ('app/stocks' );
        }else{
            Alert::error('Algo deu errado, tente novamente!','error');
            return redirect ('app/stocks' );
        }
    }
}
