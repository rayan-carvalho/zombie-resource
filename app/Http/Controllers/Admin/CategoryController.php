<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
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
            ["title" => "Categorias", "url" => ""]
        ]);


        $categories = Category::select('id','name')->get();

        return view('admin.categories.index',compact('categories','breadcrumb'));
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
            ["title" => "Categorias", "url" => route('categories.index')],
            ["title" => "Nova Categoria", "url" => ""],
        ]);

        return view('admin.categories.create', ['category' => new Category()],compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 

        $data = $request->all();
        $category = Category::create($data);

        if($category){
                Alert::toast('Cadastrado com sucesso!','success');
                return redirect ('app/categories');
        }else{
                Alert::error('Erro ao cadastrar, tente novamente!','error');
                return redirect ('app/categories');
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
        $category = Category::where('id',$id)->first();
        $breadcrumb = json_encode([
            ["title" => "Dashboard", "url" => route('home.index')],
            ["title" => "Categorias", "url" => route('categories.index')],
            ["title" => "Detalhes da Categoria", "url" => ""],
        ]);


        return view('admin.categories.show',compact('category','breadcrumb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::where('id',$id)->first();    
        $breadcrumb = json_encode([
            ["title" => "Home", "url" => route('home.index')],
            ["title" => "Categorias", "url" => route('categories.index')],
            ["title" => "Detalhes da Categoria", "url" => route('categories.show',$id)],
            ["title" => "Editar Categoria", "url" => ""],
        ]);


       return view('admin.categories.edit',compact('category','breadcrumb'));
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
    
        $category = Category::where('id',$id)->first();
        $data = $request->all();
        $category->name = $data['name'];
        $category->description = $data['description'];
        $response = $category->save();

        if($response){
            Alert::toast('Editado com sucesso!','success');
            return redirect ('app/categories/'.$category->id );
           }else{
            Alert::error('Erro ao editar, tente novamente!','error');
            return redirect ('app/categories/'.$category->id );
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

        $category = Category::where('id',$id)->first();
        $response = $category->delete();

        if($response){
            Alert::toast('Deletado com sucesso!','success');
            return redirect ('app/categories' );
        }else{
            Alert::error('Erro ao deletar, tente novamente!','error');
            return redirect ('app/categories' );
        }
    }
}

