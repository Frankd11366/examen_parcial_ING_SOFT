<?php

require '../../modelos/visitante.php';

$procedencia = $_POST['vis_procedencia'];
$razon = $_POST['vis_razon'];

// VALIDAR INFORMACION
$_POST['vis_nombres'] = htmlspecialchars($_POST['vis_nombres']);
$_POST['vis_apellidos'] = htmlspecialchars($_POST['vis_apellidos']);
$_POST['vis_procedencia'] = htmlspecialchars($_POST['vis_apellidos']);
$_POST['vis_fecha_ingreso'] = htmlspecialchars($_POST['vis_fecha_ingreso']);
$_POST['vis_fecha_salio'] = htmlspecialchars($_POST['vis_fecha_salio']);
$_POST['vis_razon'] = htmlspecialchars($_POST['vis_razon']);

if ($_POST['vis_nombres'] == '' || $_POST['vis_apellidos'] == '' || $_POST['vis_procedencia'] == '' || $_POST['vis_fecha_ingreso'] == '' || $_POST['vis_fecha_salio'] == '' || $_POST['vis_razon'] == '' ) {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $visitantes = new Visitantes($_POST);
        $guardar = $visitantes->guardar();
        $resultado = [
            'mensaje' => 'VISITANTE INSERTADO CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR INSERTANDO A LA BD',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }
}


$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= $resultado['detalle'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/clientes/index.php" class="btn btn-primary w-100">Volver al formulario</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>