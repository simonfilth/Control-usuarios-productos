<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Productos;
use App\TipoUsuarios;
use App\Categorias;
use PDF;
use DB;
class PdfController extends Controller
{
    public function reporteUsuarios() 
    {
        $data = $this->getData();
        $date = date('Y/m/d');
        $invoice = "Usuarios";
        $view =  \View::make('pdf.reporte-usuarios', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Reporte de Usuarios');
    }
    public function reporteProductos() 
    {
        $productos = Productos::all();
        $categorias = Categorias::all();
        $date = date('Y-m-d');
        $invoice = "Productos";
        $view =  \View::make('pdf.reporte-productos', compact('productos', 'categorias', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Reporte de Productos');

        // return $pdf->download('Reporte de Productos.pdf');
    }
    public function getData() 
    {
        $usuarios = User::all();
        $tipo = DB::table('users')
            ->join('tipousuarios', 'users.tipousuarioid', '=', 'tipousuarios.id')
            ->select('tipousuarios.name')
            ->get();
        for ($i=0; $i < $usuarios->count(); $i++) {            
            $data[$i] =  [
                'id'      => $usuarios[$i]["id"] ,
                'name'   => $usuarios[$i]["name"],
                'email'   => $usuarios[$i]["email"],
                'telefono'   => $usuarios[$i]["telefono"],
                'address'   => $usuarios[$i]["address"],
                'username'     => $usuarios[$i]["username"],
                'tipousuarioid'     => $tipo[$i]->name
            ];
        }      
        return $data;
    }
}
