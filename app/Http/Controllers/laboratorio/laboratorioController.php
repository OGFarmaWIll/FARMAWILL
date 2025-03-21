<?php

namespace App\Http\Controllers\laboratorio;

use App\Http\Controllers\Controller;
use App\Models\laboratorio;
use Illuminate\Http\Request;

class laboratorioController extends Controller
{
    public function index()
    {
        return view('laboratorio.laboratorio');
    }

    public function ListarLaboratorio()
    {
        $laboratorio = laboratorio::all();
        return response()->json($laboratorio);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
        ]);
        laboratorio::create([
            'c_desc' => $request->nombre,
            'c_tipo' => $request->tipo,
        ]);
        return response()->json(['mensaje' => 'Laboratorio creado correctamente']);
    }
    
    public function show($id)
    {
        $laboratorio = laboratorio::find($id);
        return response()->json($laboratorio);
    }

    public function update(Request $request, $id)
    { 
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
        ]);
        $laboratorio = laboratorio::find($id);
        $laboratorio->c_desc = $request->nombre;
        $laboratorio->c_tipo = $request->tipo;
        $laboratorio->save();

        return response()->json(['mensaje' => 'Laboratorio actualizado correctamente']);
    }
   
    public function destroy($id)
    {
        $laboratorio = laboratorio::find($id);
        $laboratorio->delete();
        return response()->json(['mensaje' => 'Laboratorio eliminado correctamente']);
    }
}
