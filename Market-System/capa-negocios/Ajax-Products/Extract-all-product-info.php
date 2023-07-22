<?php
include('../receptor.php');
include('../../capa-datos/conexion.php');
    if(isset($_REQUEST['id'])&&isset($_REQUEST['Categoria'])){
        $categoria = $_REQUEST['Categoria'];
        $id = $_REQUEST['id'];
        $create_object = new Productos();
        echo json_encode($create_object->Extract_Products_SQL($id,$categoria));
    }else{ echo 'Datos incorrectos';}
?>