<div class="modal fade" id="modalRoles" tabindex="-1" aria-labelledby="modalRolesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRolesLabel">Administrar Roles</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               
                    <div class="mb-3">
                        <label for="nombreRol" class="form-label">Nombre del Rol</label>
                        <input type="text" class="form-control" id="nombreRol" >
                    </div>
                    
                    <div class="mb-3">
                        <div class="mb-3">
                            <h5>Permisos</h5>
                            <div class="row" id="permisosContainer">
                                <div class="col-md-6">
                                    <h6 class="mb-2">General</h6>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="inicio">
                                        Inicio
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="caja">
                                        Caja
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="vender">
                                        Vender
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="productos">
                                        Productos
                                    </label>
    
                                    <h6 class="mt-3 mb-2">Catálogos</h6>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="categorias">
                                        Categorías
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="laboratorios">
                                        Laboratorios
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="clientes">
                                        Clientes
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="doctores">
                                        Doctores
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="proveedores">
                                        Proveedores
                                    </label>
                                </div>
    
                                <div class="col-md-6">
                                    <h6 class="mb-2">Almacén</h6>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="inventario">
                                        Inventario
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="reabastecimiento">
                                        Reabastecimiento
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="pedidos">
                                        Pedidos
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="guia_remision">
                                        Guía de Remisión
                                    </label>
    
                                    <h6 class="mt-3 mb-2">Reportes</h6>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="reporte_venta">
                                        Ventas
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="reporte_cliente">
                                        Ventas por Cliente
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="reporte_doctor">
                                        Ventas por Doctor
                                    </label>
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permisos[]" value="reporte_usuario">
                                        Ventas por Usuario
                                    </label>
    
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="btnGuardarRol" >
                            <i class="fas fa-save" ></i> Guardar</button>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                
            </div>
        </div>
    </div>
</div>
