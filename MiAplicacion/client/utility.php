<?php

function findClient($data, $id)
{
    foreach ($data as $client) {
        if ($client['id'] == $id)
            return $client;
    }
    echo "<script>window.location.href='/MiAplicacion/error.php?msg=Id no existente en la base de datos'</script>";
    exit();
}

function validateId()
{
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        return intval($_GET['id']);
    } else {
        echo "<script>window.location.href='/MiAplicacion/error.php?msg=Id no válido o no existe'</script>";
        exit();
    }
}
function validateAction()
{
    if (isset($_GET['action']) && ($_GET['action'] == 'show' || $_GET['action'] == 'edit' || $_GET['action'] == 'update' || $_GET['action'] == 'delete')) {
        return $_GET['action'];
    } else {
        echo "<script>window.location.href='/MiAplicacion/error.php?msg=Acción no válida'</script>";
        exit();
    }
}

function showTitle($action)
{
    switch ($action) {
        case "edit":
            echo "<h1 class=\"mb-4\">Editar Cliente</h1>";
            break;
        case "delete":
            echo "<h1 class=\"mb-4\">Borrar Cliente</h1>";
            break;
        case "show":
            echo "<h1 class=\"mb-4\">Mostrar Cliente</h1>";
            break;
        case "Borrado":
            echo "<h1 class=\"mb-4\">Cliente Borrado</h1>";
            break;
        default:
            // No hago nada
            break;
    }
}

function editOrNot($action)
{
    if ($action == "show" || $action == "delete" ){
        echo " readOnly";
    }
} 

function editOrNotSelect($action)
{
    if ($action == "show" || $action == "delete" ){
        echo " disabled";
    }
} 

function showButton($action){
    switch ($action) {
        case "edit":
            echo "<button type='submit' class='btn btn-primary' value = 'Edit'>Editar</button>";
            break;
        case "delete":
            echo "<button type='submit' class='btn btn-primary' value = 'Delete'>Borrar</button>";
            break;
        case "show": 
            echo "<a href='/MiAplicacion/client' class='btn btn-primary btn-sm'>Volver</a>";
            break;
        case "Borrado": 
            echo "<a href='/MiAplicacion/client' class='btn btn-primary btn-sm'>Volver</a>";
            break;
        default:
            // No hago nada
            break;
    }
}

function deleteClient($data,$id){
    $i=0;
    foreach ($data as $clave => $client) {
        if ($client['id'] == $id){
            unset($_SESSION['data'][$clave]);
            return $client;
        }
        $i++;
    }
    echo "<script>window.location.href='/MiAplicacion/error.php?msg=Id no existente en la base de datos'</script>";
    exit();

}