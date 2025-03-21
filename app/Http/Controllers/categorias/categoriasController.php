<?php

namespace App\Http\Controllers\categorias;

use App\Http\Controllers\Controller;
use App\Models\categorias;
use Illuminate\Http\Request;

class categoriasController extends Controller
{
    public function index()
    {
        return view('categorias.categorias');
    }

    public function ListarCategoria()
    {
        $categorias = categorias::all();
        return response()->json($categorias);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
        ]);
        
        categorias::create([
            'c_desc' => $request->nombre,
            'c_tipo' => $request->tipo,
        ]);
        return response()->json(['mensaje' => 'Categoria creada correctamente']);
    }
    
    public function show($id)
    {
        $categoria = categorias::find($id);
        return response()->json($categoria);
    }

    public function update(Request $request, $id)
    { 

        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
        ]);
        $categoria = categorias::find($id);
        $categoria->c_desc = $request->nombre;
        $categoria->c_tipo = $request->tipo;
        $categoria->save();


        return response()->json(['mensaje' => 'Categoria actualizada correctamente']);
    }
   
    public function destroy($id)
    {
        $categoria = categorias::find($id);
        $categoria->delete();
        return response()->json(['mensaje' => 'Categoria eliminada correctamente']);
    }


}
