<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\twl_permisos;
use App\Models\twl_roles;
use App\Models\twl_rol_permisos;
use App\Models\Usuario;
use App\Models\twl_usuario_roles;

class rolesController extends Controller
{
    public function index()
    {
        return view('roles.index');
    }

    public function listarPermisos(){

        $permisos = twl_permisos::all();
        return response()->json($permisos);
    }

    public function ListarRoles(){
        $roles = twl_roles::all();
        return response()->json($roles);

    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'nullable',
            'usuario_login' => 'required',
            'password' => 'required',
            'rol' => 'required'
        ]);

        $usuario = Usuario::create([
            'c_nombre' => $request->nombre,
            'c_apellidos' => $request->apellido,
            'c_login' => $request->usuario_login,
            'c_pass' => $request->password,
            'c_estado' => 1
        ]);

      
        twl_usuario_roles::create([
            'c_idusuario' => $usuario->c_idusuario,
            'c_idrol' => $request->rol
        ]);

        return response()->json([
            'mensaje' => 'Usuario creado correctamente',
            'status' => 'success'
        ]);
    }

    public function guardarRol(Request $request)
    {
        $request->validate([
            'nombreRol' => 'required',
            'permisos' => 'required|array' 
        ]);
    
      
        $rol = twl_roles::create([
            'c_descr' => $request->nombreRol,
        ]);
    
     
        foreach ($request->permisos as $permiso_id) {
            twl_rol_permisos::create([
                'c_idrol' => $rol->c_idrol,
                'c_idpermiso' => $permiso_id, 
            ]);
        }
    
        return response()->json([
            'mensaje' => 'Rol creado correctamente',
            'status' => 'exito'
        ]);
    }

    public function listarUsuarios(){
        $usuario = Usuario::all();

        return response()->json($usuario);

    }

    public function show($id){
        $usuario = Usuario::find($id);
        return response()->json($usuario);
    }


    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'nullable',
            'usuario_login' => 'required',
            'password' => 'nullable',
            'rol' => 'required'
        ]);

        $usuario = Usuario::find($id);
        
        if($request->password == "" ){
          $usuario->update([
           'password' => $request->password
        ]);
        }

        $usuario->update([
            'c_nombre' => $request->nombre,
            'c_apellidos' => $request->apellido,
            'c_login' => $request->usuario_login,
            'c_estado' => 1
        ]);

        twl_usuario_roles::where('c_idusuario', $id)->update([
            'c_idrol' => $request->rol
        ]);

        return response()->json([
            'mensaje' => 'Usuario actualizado correctamente',
            'status' => 'success'
        ]);


    }



}
