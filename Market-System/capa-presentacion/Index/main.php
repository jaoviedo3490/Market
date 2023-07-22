<?php
session_start();
    if(!isset($_SESSION['session'])){
        header("Location: ../../index.php");
    }
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
        <script src="../../sweetalert/sweetalert.min.js"></script>
        <script src="main.js">
        </script>
        <script src="ajax.js">
        </script>
    </head>
    <body>
        <header class="bg-primary">
            <div class="container">
                <nav class="navbar">
                    <div class="row">
                        <div class="col" style="margin-bottom:-6%;">
                            <h4 class="display-6" style="font-family:sans-serif;text-decoration:none;color:white;"><a href="main.php" style="color:white;text-decoration:none;"><?=$_SESSION['priv']?></a></h4>
                        </div>

                    </div>           
                </nav>
                <?php
                    if($_SESSION['priv']=='empleado'){?>
                    <nav class="navbar-auto">
                    <div class="row">
                        <div  class="col">
                            <a href="#"  style="color:white;text-decoration:none;">Caja</a>
                        </div>
                        <div  class="col">
                            <a href="#"  id='perfil' style="color:white;text-decoration:none;">Mi Perfil</a>
                        </div>
                        <div class="col">
                            <a href="../../capa-negocios/closed_session.php" style="color:white;text-decoration:none;">Cerrar Sesion</a>
                        </div>
                    </div>
                    </nav>
                    </header><br>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <form>
                                        Nueva Factura
                                        <input class='form-control'type='text' placeholder='Ingrese codigo de producto o codigo de barras'>
                                        <br><br>
                                        <a href="#" class='btn btn-info'>Agregar Producto</a>
                                    </form>
                                </div><div class="col">
                                        Producto:
                                        <li>
                                            <ul>Producto 1<a style='margin-left:50%'>2000$</a></ul>
                                            <ul>Producto 2<a style='margin-left:50%'>2000$</a></ul>
                                            <ul>Producto 3<a style='margin-left:50%'>2000$</a></ul>
                                            <ul>Producto 4<a style='margin-left:50%'>2000$</a></ul>
                                            <ul>Producto 5<a style='margin-left:50%'>2000$</a></ul>
                                            <ul>Producto 6<a style='margin-left:50%'>2000$</a></ul>
                                            <ul>Producto 7<a style='margin-left:50%'>2000$</a></ul>
                                        </li>
                                        <h5>Precio Total</h5>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                    <a href='#' class='btn btn-success' style='width:100%'>Finalizar Compra</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }else if($_SESSION['priv']=="Administrador"){
                    ?>
                <nav class="navbar-auto">
                    <div class="row">
                        <div  class="col p-auto">
                            <a href="#" id="opciones" style="color:white;text-decoration:none; ">
                            <select id="options" name="opciones" class="btn btn-primary">
                                <option selected hidden>Mas Opciones</option>
                                <option value="Crear-Producto" id="new-product">Crear Producto</option>
                                <option value="Editar/Eliminar-Products" id="update-product">Editar/Eliminar Producto</option>
                                <option value="Buscar palabra clave" id="search">Buscar palabra Clave</option>
                            </select></a>
                            
                        </div>
                        <div class="col">
                            <a href="Management_Accounts/main_accounts.php" style="color:white;text-decoration:none;">Administrar Cuentas</a>
                        </div>
                        <div  class="col">
                            <a href="#"  id='caja' style="color:white;text-decoration:none;">Caja</a>
                        </div>
                        <div  class="col">
                            <a href="#"  id='perfilo' style="color:white;text-decoration:none;">Mi Perfil</a>
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
                <div class="col-auto">
                    <div class="card" style="width: 18rem; margin:2px;">
                        <img class="card-img-top"  src="../../resources/Limpieza.webp"  alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Poductos de Aseo Personal</h5>
                            <p class="card-text"></p>
                            <a href="producto.php?product=Aseo%20Personal" class="btn btn-outline-info" style="width:100%">Ver Productos</a>
                        </div>
                    </div>                    
                </div><div class="col-auto">
                    <div class="card" style="width: 18rem;margin:2px;">
                        <img class="card-img-top" src="../../resources/Limpieza.webp" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Productos de Limpieza del Hogar</h5>
                            <p class="card-text"></p>
                            <a href="producto.php?product=Limpieza%20del%20hogar" class="btn btn-outline-info" style="width:100%">Ver Productos</a>
                        </div>
                    </div>                    
                </div><div class="col-auto">
                    <div class="card" style="width: 18rem;margin:2px;">
                        <img class="card-img-top" src="../../resources/Limpieza.webp" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Productos a Granel</h5>
                            <p class="card-text"></p>
                            <a href="producto.php?product=Granel"class="btn btn-outline-info" style="width:100%">Ver Productos</a>
                        </div>
                    </div>                    
                </div><div class="col-auto">
                    <div class="card" style="width: 18rem;margin:2px;">
                        <img class="card-img-top" src="../../resources/Limpieza.webp" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Productos Fruver</h5>
                            <p class="card-text"></p>
                            <a href="producto.php?product=Fruver" class="btn btn-outline-info" style="width:100%">Ver Productos</a>
                        </div>
                    </div>                    
                </div><div class="col-auto">
                    <div class="card" style="width: 18rem;margin:2px;">
                        <img class="card-img-top" src="../../resources/Limpieza.webp" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Productos Carnicos</h5>
                            <p class="card-text"></p>
                            <a href="producto.php?product=Carnicos" class="btn btn-outline-info" style="width:100%">Ver Productos</a>
                        </div>
                    </div>                    
                </div><div class="col-auto">
                    <div class="card" style="width: 18rem;margin:2px;">
                        <img class="card-img-top" src="../../resources/Limpieza.webp" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Productos Lacteos</h5>
                            <p class="card-text"></p>
                            <a href="producto.php?product=Lacteos" class="btn btn-outline-info" style="width:100%">Ver Productos</a>
                        </div>
                    </div>                    
                </div><div class="col-auto">
                    <div class="card" style="width: 18rem;margin:2px;">
                        <img class="card-img-top" src="../../resources/Limpieza.webp" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Alimentos para Animales</h5>
                            <p class="card-text"></p>
                            <a href="producto.php?product=Alimentos" class="btn btn-outline-info" style="width:100%">Ver Productos</a>
                        </div>
                    </div>                    
                </div><div class="col-auto">
                    <div class="card" style="width: 18rem;margin:2%;">
                        <img class="card-img-top" src="../../resources/Limpieza.webp" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Dulces Confituras y demas...</h5>
                            <p class="card-text"></p>
                            <a href="producto.php?product=Confituras" class="btn btn-outline-info" style="width:100%">Ver Productos</a>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <?php }else{
            $cuerpo  ="</nav></div></header>";
            $cuerpo .= "<div class='container'>";
            $cuerpo .="<h2 style='margin:7%;'>Error al Acceder a los permisos del usuario</h2><a href='../index.php'>Inicio</a>";
            $cuerpo .="</div>";
            echo $cuerpo;
        }
           ?>
    </body>
</html>