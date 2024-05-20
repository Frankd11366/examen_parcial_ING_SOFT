<?php 

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">FORMULARIO DE VISITANTES</h1>
<div class="row justify-content-center">
    <form action="/controladores/visitantes/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="vis_nombres">NOMBRES</label>
                <input type="text" name="vis_nombres" id="vis_nombres" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="vis_apellidos">APELLIDOS</label>
                <input type="text" name="vis_apellidos" id="vis_apellidos" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="vis_procedencia">PROCEDENCIA</label>
                <input type="text" name="vis_procedencia" id="vis_procedencia" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="vis_fecha_ingreso">Fecha y Hora que Ingresó</label>
                <input type="text" name="vis_fecha_ingreso" id="vis_fecha_ingreso" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="vis_fecha_ingreso">Fecha y Hora que Ingresó</label>
                <input type="text" name="vis_fecha_ingreso" id="vis_fecha_ingreso" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="vis_fecha_salio">Fecha y Hora que Salió</label>
                <input type="text" name="vis_fecha_salio" id="vis_fecha_salio" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="vis_razon">Razón</label>
                <input type="text" name="vis_razon" id="vis_razon" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/visitantes/buscar.php" class="btn btn-secondary w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>

   