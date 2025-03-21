<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\doctores;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class doctorController extends Controller
{
    public function index()
    {
        return view('doctor.doctor');
    }

    public function ListarDoctor()
    {
        $doctores = doctores::all();
        return response()->json($doctores);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'especialidad' => 'required',
            'codigoMedico' => 'nullable',
            'email' => ['nullable', 'email', Rule::unique('twl_doctor', 'c_email')],
            'direccion' => 'nullable',
            'telefono' => 'nullable'
        ], [
            'email.unique' => 'El email ya está en uso',
          
        ]);

        doctores::create([
            'c_nombres' => $request['nombre'],
            'c_especialidad' => $request['especialidad'],
            'c_cmp' => $request['codigoMedico'],
            'c_email' => $request['email'],
            'c_direccion' => $request['direccion'],
            'c_telefono' => $request['telefono']
        ]);
        return response()->json(['mensaje' => 'Doctor creado correctamente']);
    }
    
    public function show($id)
    {
        $doctor = doctores::find($id);
        return response()->json($doctor);
    }

    public function update(Request $request, $id)
    { 
        $request->validate([
            'nombre' => 'required',
            'especialidad' => 'required',
            'codigoMedico' => 'nullable',
            'email' => ['nullable', 'email', Rule::unique('twl_doctor', 'c_email')->ignore($id, 'c_iddoctor')],
            'direccion' => 'nullable',
            'telefono' => 'nullable'
        ], [
            'email.unique' => 'El email ya está en uso',
        ]);

        $doctor = doctores::find($id);
        $doctor->update([
            'c_nombres' => $request['nombre'],
            'c_especialidad' => $request['especialidad'],
            'c_cmp' => $request['codigoMedico'],
            'c_email' => $request['email'],
            'c_direccion' => $request['direccion'],
            'c_telefono' => $request['telefono']
        ]);
        return response()->json(['mensaje' => 'Doctor actualizado correctamente']);
    }
   
    public function destroy($id)
    {
        $doctor = doctores::find($id);
        $doctor->delete();
        return response()->json(['mensaje' => 'Doctor eliminado correctamente']);
    }
}
