<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Resource;
use App\Models\Admin\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ResourceValidationFormRequest;


class ResourceController extends Controller
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
            ["title" => "Recursos", "url" => ""]
        ]);

        $resources = Resource::select('resources.id','resources.name','categories.name as category','resources.amount')
                                ->join('categories', 'categories.id', '=', 'resources.category_id')                               
                                ->get();
        
        return view('admin.resources.index',compact('resources','breadcrumb'));
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
            ["title" => "Recursos", "url" => route('resources.index')],
            ["title" => "Novo Recurso", "url" => ""],
        ]);

        $categories = Category::all();
       

        return view('admin.resources.create', ['resource' => new Resource()],compact('breadcrumb','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResourceValidationFormRequest $request)
    {

        $data = $request->all();   

        $resource = Resource::create($data);

        $file = $data['image'];       
        $resource->image = $file->store('images'); 
        $resource->save();
        unset($resource->image );

        if($resource){
                Alert::toast('Cadastrado com sucesso!','success');
                return redirect ('app/resources' );
        }else{
                Alert::error('Erro ao cadastrar, tente novamente!','error');
                return redirect ('app/resources' );
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

        $breadcrumb = json_encode([
            ["title" => "Dashboard", "url" => route('home.index')],
            ["title" => "Recursos", "url" => route('resources.index')],
            ["title" => "Detalhes do Recurso", "url" => ""],
        ]);

        return view('admin.resources.show',compact('resource','breadcrumb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resource = Resource::where('id',$id)->first();    

        $categories = Category::all();

        $breadcrumb = json_encode([
            ["title" => "Home", "url" => route('home.index')],
            ["title" => "Recursos", "url" => route('resources.index')],
            ["title" => "Detalhes do Recurso", "url" => route('resources.show',$id)],
            ["title" => "Editar Recurso", "url" => ""],
        ]);      

       return view('admin.resources.edit',compact('resource','categories','breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResourceValidationFormRequest $request, $id)
    {
        $data                 =  $request->all();   
        $resource              =  Resource::where('id',$id)->first(); 
        $resource->name        =  $data['name'];    
        $resource->minimum     =  $data['minimum'];
        $resource->category_id =  $data['category_id'];
        $resource->description =  $data['description'];

        if(!empty($data['image'])){  
            
                Storage::disk()->delete($resource->image); 
                $file = $data['image'];
                $resource->image = $file->store('images');            
        }
        
        $response = $resource->save();

        if($response){
            Alert::success('', 'Editado com sucesso!');
            return redirect ('app/resources/'.$resource->id );
           }else{
            Alert::error('', 'Erro ao editar!');
            return redirect ('app/resources/'.$resource->id );
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
        
        $resource = Resource::where('id',$id)->first();     

        Storage::disk()->delete($resource->image);    

        $response = $resource->delete();

        if($response){
            Alert::toast('Deletado com sucesso!','success');
            return redirect ('app/resources' );
        }else{
            Alert::error('Algo deu errado, tente novamente!','error');
            return redirect ('app/resources' );
        }
    }
}
