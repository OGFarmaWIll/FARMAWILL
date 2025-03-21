<?php

namespace App\Http\Controllers\cliente;

use App\Http\Controllers\Controller;
use App\Models\clientes;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class clienteController extends Controller
{
    public function index()
    {
        return view('cliente.cliente');
    }

    public function ListarCliente()
    {
        $clientes = clientes::all();
        return response()->json($clientes);
    }

    public function store(Request $request)
    {
      
            $request->validate([
                'nombre' => 'required',
                'email' => ['nullable', 'email', Rule::unique('twl_clientes', 'c_email')],
                'dni' => 'nullable',
                'telefono' => 'nullable',
                'direccion' => 'nullable'
            ], [
                'email.unique' => 'El email ya está en uso'
            ]);

            clientes::create([
                'c_nombres' => $request->nombre,
                'c_email' => $request->email,
                'c_iddni' => $request->dni,
                'c_telefono' => $request->telefono,
                'c_direccion' => $request->direccion
            ]);

            return response()->json(['mensaje' => 'Cliente creado correctamente']);
        
    }
    
    public function show($id)
    {
        $cliente = clientes::find($id);
        return response()->json($cliente);
    }

    public function update(Request $request, $id)
    { 
       
            $request->validate([
                'nombre' => 'required',
                'email' => ['nullable', 'email',Rule::unique('twl_clientes', 'c_email')->ignore($id, 'c_idcliente')],
                'dni' => 'nullable',
                'telefono' => 'nullable',
                'direccion' => 'nullable'
            ], [
                'email.unique' => 'El email ya está en uso'
            ]);

            $cliente = clientes::find($id);
            $cliente->c_nombres = $request->nombre;
            $cliente->c_email = $request->email;
            $cliente->c_iddni = $request->dni;
            $cliente->c_telefono = $request->telefono;
            $cliente->c_direccion = $request->direccion;

            $cliente->save();

            return response()->json(['mensaje' => 'Cliente actualizado correctamente']);
        
    }
   
    public function destroy($id)
    {
        $cliente = clientes::find($id);
        $cliente->delete();
        return response()->json(['mensaje' => 'Cliente eliminado correctamente']);
    }
}
