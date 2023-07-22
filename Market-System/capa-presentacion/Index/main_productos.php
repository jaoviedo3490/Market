<?php
    @session_start();
    if(!isset($_SESSION['session']))
        header('Location: ../../index.php');
    
     
    include('../../capa-negocios/receptor.php');
    include('../../capa-datos/conexion.php');
    $consulta = new Productos();
    $array = array();
    $array = $consulta->Extract_All_Data_Object_();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=EDGE">
        <script src='../../jquery/jquery.js'></script>
        <link rel="stylesheet" href="../../bootstrap.css">
        <script src="../../sweetalert/sweetalert.min.js"></script>
        <script src="../../app.js">
        </script>
        <script src='main.js'>
        </script>
    </head>
    <header class="bg-primary">
            <div class="container">
                <nav class="navbar">
                    <div class="row">
                        <div class="col" style="margin-bottom:-6%;">
                            <h4 class="display-6" style="font-family:sans-serif;text-decoration:none;color:white;"><a href="main.php" style="color:white;text-decoration:none;"><?=$_SESSION['priv']?></a></h4>
                        </div>

                    </div>           
                </nav>
                <nav class="navbar-auto">
                    <div class="row">
                        <div  class="col p-auto">
                            <a href="#" id="opciones" style="color:white;text-decoration:none;">
                            <select id="options" name="opciones" class="btn btn-primary">
                                <option selected id='selected-option' hidden>Mas Opciones</option>
                                <option value="Crear-Producto" id="new-product">Crear Producto</option>
                                <option value="Editar/Eliminar-Products" id="update-product">Editar/Eliminar Producto</option>
                                <option value="Buscar palabra clave" id="search">Buscar palabra Clave</option>
                            </select></a>
                            
                        </div>
                        <div class="col">
                            <a href="Management_Accounts/main_accounts.php" style="color:white;text-decoration:none;">Administrar Cuentas</a>
                        </div>
                        <div  class="col">
                            <a href="#"  id="caja" style="color:white;text-decoration:none;">Caja</a>
                        </div>
                        <div  class="col">
                            <a href="#"  id='perfil' style="color:white;text-decoration:none;">Mi Perfil</a>
                        </div>
                        <div class="col">
                            <a href="../../capa-negocios/closed_session.php" style="color:white;text-decoration:none;">Cerrar Sesion</a>
                        </div>
                    </div>
                </nav>
                <hr>
            </div>
        </header>
        <div class="container-fluid" id="c">
            <div class="row">
                <div class='container'>
                        <div class='row'>
                            <div class='col'><h4>Editar / Eliminar Producto</h4>
                                <form id='search-form' hidden>
                                    <input class='form-control' type='search' id='ñ' placeholder='Buscar Palabra Clave'>
                                        </form>
                                            </div>
                                                </div>
                                            </div>
                                        <div class='container-fluid'>
                                    <div class='row'>
                                <div clas='col'>
                            </div>
                            </div>
                        </div>
            </div>
        </div>
        <div class='container' id='bar-search'>
            <div class='row'>
                <div class='col'>
                    <form>
                        <input class='form form-control' type='search' id='busqueda' placeholder='Ingresa una palabra clave'>
                    </form>
                </div>
            </div>
        </div>
        <div class="container" id='content-content'>
            <div class="row">
                <div class="col">
                <?php
                     if(empty($array[0])) echo '<br><h3 id="header-" class="display-3">Sin productos registrados</h3>';
                        else{
                            
                                    echo "<br><br><table class='table table-striped'>";
                                    echo "<tr>";
                                    echo "<td class='col-sm-2'>ID</td>";
                                    echo "<td class='col-sm-2'>Nombre</td>";
                                    echo "<td class='col-sm-2'>Categorias</td>";
                                    echo "<td class='col-sm-2'>Acciónes</td>";
                                    echo "</tr>";
                                    $contador = 0;
                                    foreach($array as $dato){
                                        echo "<tr id='tabla'>";
                                        foreach($dato as $dat){
                                            echo "<td class='col-sm-2' id='tabla'>".$dat."</td>";
                                        }
                                        echo "<td class='col-sm-2' value='".@$array[$contador][0]."'><a href id='suspend' style='margin-right:5px;'><img style='width:20%;heigth:20%;' src='../../resources/editar.png'/></a><a id='delete' href><img style='width:20%;heigth:20%;' src='../../resources/delete.png'/></a></td></tr>";
                                        $contador++;
                                    }
                                    echo "</table>";
                                }
                            ?>
                </div>
            </div>
        </div>   
    <body>


    
        <footer>
          
        <div class="col-auto" style="margin:2%;">
                        <p>
                            <a href="main.php">Menu Principal</a>
                        </p>
                    </div>
        </footer>
    </body>
</html>