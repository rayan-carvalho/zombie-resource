<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UserValidationFormRequest;


class UserController extends Controller
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
            ["title" => "Usuários", "url" => ""]
        ]);

        $users = User::select('id','name','phone','mobile')->get();

        return view('admin.users.index',compact('users','breadcrumb'));
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
            ["title" => "Usuários", "url" => route('users.index')],
            ["title" => "Novo Usuário", "url" => ""],
        ]);
  
        return view('admin.users.create', ['user' => new User()],compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserValidationFormRequest $request)
    {
            $data = $request->all();       
            $data['password'] = bcrypt($data['password']);  
            $user = User::create($data);

            if($user){
                    Alert::toast('Cadastrado com sucesso!','success');
                    return redirect ('app/users' );
            }else{
                    Alert::error('Algo deu errado, tente novamente!','error');
                    return redirect ('app/users' );
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
            ["title" => "Usuários", "url" => route('users.index')],
            ["title" => "Detalhes do Usuário", "url" => ""],
        ]);

        $user = User::find($id);

        return view('admin.users.show',compact('user','breadcrumb'));
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
            ["title" => "Usuários", "url" => route('users.index')],
            ["title" => "Detalhes do Usuário", "url" => route('users.show',$id)],
            ["title" => "Editar Usuário", "url" => ""],
        ]);

        $user = User::findOrFail($id); 

       return view('admin.users.edit',compact('user','breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserValidationFormRequest $request, $id)
    {

        $user = User::findOrFail($id);
        $data = $request->all();
        if($data['password'] == null){
            unset($data['password']);   
        }else{
            $data['password'] = bcrypt($data['password']); 
        }       
        $response = $user->update($data);

        if($response){

            Alert::toast('Editado com sucesso!','success');
            return redirect ('app/users/'.$user->id );

           }else{
            Alert::error('Algo deu errado, tente novamente!','error');
            return redirect ('app/users/'.$user->id );
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
        $user = User::findOrFail($id);
      
        $response = $user->delete();

        if($response){
            Alert::toast('Deletado com sucesso!','success');
            return redirect ('app/users' );
        }else{
            Alert::error('Algo deu errado, tente novamente!','error');
            return redirect ('app/users' );
        }
    }

}
