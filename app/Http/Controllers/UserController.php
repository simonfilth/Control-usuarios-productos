<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;//llama al modelo
use App\TipoUsuarios;//llama al modelo
use Flash;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    public function index(Request $request)
    {
        $usuarios = User::valor($request->get('buscar'),$request->get('select'))->orderby('id','ASC')->paginate(15);
        $tipousuarios = TipoUsuarios::all();
        return \View::make('user.index',compact('usuarios'))
        ->with('tipousuarios',$tipousuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user=User::create($request->all());
        $user->password = bcrypt($request->password);
        
        $user->save();

        return redirect('user/index')
        ->with("message","Usuario agregado correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$user= User::findOrFail($id);
        return \View::make('user/show')
        ->with('usuarios', $user)
        ->with("message","Es hora de ver");*/

        $user = User::findOrFail($id);
        $tipousuarios = TipoUsuarios::all();
        return \View::make('user.show')
        ->with('usuarios', $user)
        ->with('tipousuarios', $tipousuarios);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::findOrFail($id);
        $tipousuarios = TipoUsuarios::all();
        //$tipousuarios= TipoUsuarios::findOrFail($id);
        return \View::make('user/edit')
        ->with('usuarios', $user)
        ->with('tipousuarios', $tipousuarios)
        ->with("message","Es hora de editar");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        $user= User::findOrFail($id);
        $user->fill($request->all());
        if(!empty($value)){
            $user->password = bcrypt($request->password);
        }    
        $user->save();

        return redirect('user/index')
        ->with("message","Usuario ".$user->name." ha sido editado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::findOrFail($id);
        $user->delete();
         return redirect("user/index")
        ->with("message","Se ha eliminado ".$user->name." de forma exitosa!");
    }
}
