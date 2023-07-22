<?php
    include('../../capa-datos/conexion.php');
    include('../receptor.php');
    if(isset($_REQUEST['deleter'])){
        $data_object = new Productos();
        $dato = array();
        $dato = $data_object->Delete_Product($busqueda);
        if($dato) echo 'Producto Eliminado';
        else echo 'Ha ocurrido un error al eliminar el producto';
    }else echo "Error al recibir los datos";
    ?>