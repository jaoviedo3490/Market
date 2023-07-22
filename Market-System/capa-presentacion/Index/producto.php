<?php
    @session_start();
    if(!isset($_SESSION['session']))
        header('Location: ../../index.php');
    
     
    include('../../capa-negocios/receptor.php');
    include('../../capa-datos/conexion.php');
    $consulta = new Productos();
    $array = $consulta->Extract_All_Products($_GET['product']);
    $array_ = array();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=EDGE">
        <script src="../../jquery/jquery.js"></script>
        <link rel="stylesheet" href="../../bootstrap.css">
        <script src="../../app.js">
        </script>
        <script src="main.js">
        </script>
        <script src="../../sweetalert/sweetalert.min.js">
        </script>
    </head>
    <body>
        <header class="bg-info">
            <div class="container">
                <nav class="navbar">
                    <div class="row">
                        <div class="col" style="margin-bottom:-6%;">
                            <h4 class="display-6" id='categoria' style="font-family:sans-serif;text-decoration:none;color:white;"><?=$_GET['product']?></h4>
                        </div>

                    </div>           
                </nav>
                <hr>
            </div>
        </header>
        
        <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="container-fluid">
                                    <div class="row">
                                    <?php
                                        if(empty($array)) echo "<h4 class='display-4' style='margin:5%;margin-left:15%;'>Sin Productos Registrados</h1>";
                                        else{
                                            foreach($array as $dato){
                                                $array_ = $consulta->Extract_All_Data_Object($dato);
                                               
                                                        echo "<div class='col' style='margin-top:2%'>";
                                                        echo "<div class='card' style='width: 18rem;'>";
                                                            echo "<img class='card-img-top'  src='../../resources/Limpieza.webp'  alt='Card image cap'>";
                                                            echo "<div class='card-body'>";
                                                                echo "<h5 id='Nombre' class='card-title'></h5>";
                                                                echo "<button href='#' class='btn btn-outline-success' id='objeto' onclick='Ajax($dato)' style='margin-bottom:2%;width:100%'>Ver Detalles</button>";
                                                            echo "</div>";
                                                        echo "</div>";    
                                                        echo "</div>";
                                                        echo "<script>";
                                                        echo "function Ajax(dato){
                                                            let categoria = $('#categoria').text();
                                                            $.ajax({
                                                                url:'../../capa-negocios/Ajax-Products/Extract-all-product-info.php',
                                                                method: 'post',
                                                                data: {'id':dato,'Categoria':categoria},
                                                                success: function(response){
                                                                    alert(response)
                                                                    let arreglo = new Array();
                                                                    let contador = 0;
                                                                    const json = JSON.parse(JSON.stringify(response));
                                                                    const str = json;
                                                                    const new_str_json = JSON.parse(str);
                                                                    Object.values(new_str_json).forEach(element_ =>{
                                                                        arreglo[contador] = element_;
                                                                        contador++;
                                                                    });
                                                                    $('#nombre-producto').html(arreglo[1]);
                                                                    $('#referencia-producto').html(arreglo[4]);
                                                                    $('#precio-producto').html(arreglo[2]);
                                                                    $('#stock-producto').html(arreglo[3]);
                                                                    $('#categoria-producto').html(arreglo[6]);
                                                                    $('#vendidas-producto').html(arreglo[5]);
                                                                }
                                                            })
                                                        }";
                                                        echo "</script>";
                                                }
                                            }?>  
                                    </div>
                                </div>
                                <div class='container' style='margin-left:80%'>
                                    <div class='row'>
                                        <div class='col'>
                                            <button id='1' class='btn btn-primary'>1</button>
                                            <button id='2' class='btn btn-outline-primary'>2</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    if(!empty($array)){
                        echo "<div class='col'>";
                            echo "<div class='container-fluid border border-dark rounded w-75' style='width:110%;heigth:150%;'>";
                                echo "<h1>Detalles del Producto</h1>";
                                echo "<h4>Nombre del Producto:</h4><p id='nombre-producto'></p>";
                                echo "<h4>Referencia del Producto:</h4><p id='referencia-producto'></p>";
                                echo "<h4>Precio del Producto: </h4><p id='precio-producto'></p>";
                                echo "<h4>Categoria del Producto: </h4><p id='categoria-producto'></p>";
                                echo "<h4>Unidades Disponibles: </h4><p id='stock-producto'></p>";
                                echo "<h4>Unidades Vendidas:</h4><p id='vendidas-producto'></p>";
                            echo "</div>";
                            echo "<p>";
                            echo "<a style='margin-left:12%' href='main.php'>Menu Principal</a>";
                        echo "</p>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>    
        
        </footer>
    </body>
</html>