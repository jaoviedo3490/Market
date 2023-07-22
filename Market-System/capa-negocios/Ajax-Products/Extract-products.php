<?php
    include('../../capa-datos/conexion.php');
    include('../receptor.php');
    if(isset($_REQUEST['trigger'])){
        $data_object = new Productos();
        $dato = array();
        $dato = $data_object->Extract_All_Data_Object_();
        echo json_encode($dato);
    }else echo "Error al recibir los datos";
    
?>