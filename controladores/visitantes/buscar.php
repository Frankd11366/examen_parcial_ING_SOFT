<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);
    require '../../modelos/visitante.php';

    // consulta
    try {
        // var_dump($_GET);
        $_GET['vis_nombres'] = htmlspecialchars( $_GET['vis_nombres']);
        $_GET['vis_apellidos'] = htmlspecialchars( $_GET['vis_apellidos']);
        $_GET['vis_procedencia'] = htmlspecialchars( $_GET['vis_procedencia']);
        $_GET['vis_fecha_ingreso'] = htmlspecialchars( $_GET['vis_fecha_ingreso']);
        $_GET['vis_fecha_salio'] = htmlspecialchars( $_GET['vis_fecha_salio']);
        $_GET['vis_razon'] = htmlspecialchars( $_GET['vis_razon']);

        $objVisitante = new Visitantes($_GET);
        $visitantes = $objVisitante->buscar();
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $visitantes,
            'codigo' => 1
        ];
        // var_dump($clientes);
        
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }       


    $alertas = ['danger', 'success', 'warning'];

    
    include_once '../../vistas/templates/header.php'; ?>

    <div class="row mb-4 justify-content-center">
        <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
            <?= $resultado['mensaje'] ?>
        </div>
    </div>
    <div class="row mb-4 justify-content-center">
        <div class="col-lg-6">
            <a href="../../vistas/visitantes/buscar.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
        </div>
    </div>
    <h1 class="text-center">Listado de Visitantes</h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Procedencia</th>
                        <th>Hora que Ingresó</th>
                        <th>Hora que Salió</th>
                        <th>Razón</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($visitantes) > 0) : ?>
                        <?php foreach ($visitantes as $key => $visitantes) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $visitantes['vis_nombres'] ?></td>
                                <td><?= $visitantes['vis_apellidos'] ?></td>
                                <td><?= $visitantes['vis_procedencia'] ?></td>
                                <td><?= $visitantes['vis_fecha_ingreso'] ?></td>
                                <td><?= $visitantes['vis_fecha_salio'] ?></td>
                                <td><?= $visitantes['vis_razon'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">No hay Visitantes registrados</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        
<?php include_once '../../vistas/templates/footer.php'; ?>  