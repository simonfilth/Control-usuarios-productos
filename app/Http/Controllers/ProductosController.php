<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Productos;
use App\Categorias;
use Input;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Http\UploadedFile;
// use File;
use App\Http\Requests\CreateProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
//http://www.simonaguilera.com.ve/public_html/public/
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = Productos::valor($request->get('buscar'),$request->get('select'))->orderby('id','ASC')->paginate(10);
        $categorias = Categorias::all();
        return \View::make('productos.index',compact('productos'))
        ->with('categorias',$categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductsRequest $request)
    {
        $productos=Productos::create($request->all());
        $productos->codigo = mt_rand();
        $productos->imagen = $request->image;
        $productos->save();

        return redirect('productos/index')
        ->with("message","Producto agregado correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
        // dd(public_path());
        $productos = Productos::find($id);
        $categorias = Categorias::all();
        // $url = Storage::url($productos->imagen);

        // dd(Storage::url($productos->imagen));
        return \View::make('productos.show')
        ->with('productos', $productos)
        ->with('categorias', $categorias);
        // ->with('url',$url)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos = Productos::find($id);
        $categorias = Categorias::all();

        return \View::make('productos/edit')
        ->with('productos', $productos)
        ->with('categorias', $categorias)
        ->with("message","Es hora de editar");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsRequest $request, $id)
    {
        $productos= Productos::findOrFail($id);
        $productos->fill($request->all());  
        
          if(!empty($value)){      
            $productos->imagen=$request->file('imagen')->getClientOriginalName();
            // }
            
            //obtenemos el campo file definido en el formulario
            $file = $request->file('imagen');
            //obtenemos el nombre del archivo
            $nombre = $file->getClientOriginalName();
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put($nombre,  \File::get($file));
            
        }
        $productos->save();
        return redirect('productos/index')
            ->with("message","Producto ".$productos->nombre." ha sido editado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productos= Productos::findOrFail($id);
        $productos->delete();
         return redirect("productos/index")
        ->with("message","Se ha eliminado ".$productos->name." de forma exitosa!");
    }
}
