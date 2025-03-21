<?php

namespace App\Http\Controllers\proveedor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\proveedores;
use Illuminate\Validation\Rule;

class proveedorController extends Controller
{
    public function index()
    {
        return view('proveedores.index');
    }

    public function ListarProveedores()
    {
        $proveedores = proveedores::all();
        return response()->json($proveedores);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'nullable|email|unique:twl_proveedor,c_email',
            'ruc' => 'nullable',
            'direccion' => 'nullable',
            'telefono' => 'nullable'
        ], [
            'email.unique' => 'El email ya está en uso',
          
        ]);

        proveedores::create([
            'c_ruc' => $request->ruc,
            'c_desc' => $request->nombre,
            'c_direccion' => $request->direccion,
            'c_email' => $request->email,
            'c_telefono' => $request->telefono
        ]);

        return response()->json(['mensaje' => 'Proveedor creado correctamente']);
    }

    public function show($id)
    {
        $proveedor = proveedores::find($id);
        return response()->json($proveedor);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => ['nullable', 'email', Rule::unique('twl_proveedor', 'c_email')->ignore($id, 'c_idproveedor')],
            'ruc' => 'nullable',
            'direccion' => 'nullable',
            'telefono' => 'nullable'
        ], [
            'email.unique' => 'El email ya está en uso',
          
        ]);

        $proveedor = proveedores::find($id);
        $proveedor->c_ruc = $request->ruc;
        $proveedor->c_desc = $request->nombre;
        $proveedor->c_direccion = $request->direccion;
        $proveedor->c_email = $request->email;
        $proveedor->c_telefono = $request->telefono;
        $proveedor->save();

        return response()->json(['mensaje' => 'Proveedor actualizado correctamente']);
    }

    public function destroy($id)
    {
        $proveedor = proveedores::find($id);
        $proveedor->delete();
        return response()->json(['mensaje' => 'Proveedor eliminado correctamente']);
    }
}
