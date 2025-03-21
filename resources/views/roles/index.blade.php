@extends('layout.dashboard')

@section('contenido')

<div class="container-fluid mt-4">
    <h2>Administración de Usuarios</h2>

    <div class="d-flex gap-2">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUsuario">
            <i class="fas fa-user-plus"></i> Agregar Usuario
        </button>
        
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRoles">
            <i class="fas fa-user-tag"></i> Administrar Roles
        </button>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>login</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="body_usuarios" >
               
            </tbody>
        </table>
    </div>
</div>


@include('roles.modal_usuario')


@include('roles.modal_roles')


<script src="{{ asset('js/roles/default.js') }}"></script>
<script src="{{ asset('js/roles/roles.js') }}"></script>



@endsection
