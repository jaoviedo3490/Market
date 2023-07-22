<?php
include('receptor.php');
    if(isset($_POST['trigger-1'])||isset($_POST['oculto'])){
        switch ($_POST['oculto']) {
            case 'INIT-SESION':
                $users = array();
                $Nombre = $_POST['nombre'];
                $Contraseña = $_POST['pass'];
                $create_obj = new Usuarios();
                $users = $create_obj->Extract_User_SQL($Nombre);
                if($users[2]==$Contraseña & $users[4]=='Activx') {
                    session_start();
                    $_SESSION['session'] = 1;
                    $_SESSION['id'] = $users[0];
                    $_SESSION['priv'] = $users[3];
                    $_SESSION['id'] = $users[2];
                    header('Location: datos.php');
                }else if($users[4]=="suspendida") header('Location: ../capa-presentacion/users/account-suspend.html');
                else header('Location: ../capa-presentacion/index.php');
                break;
            case 'CREATTE-SESION':
                $Nombre = $_POST['nombre'];
                $Contraseña = $_POST['pass'];
                $create_obj = new Usuarios();
                $create_obj->Create_Users_SQL($Nombre,$Contraseña,1);
                $create_obj==1 ? header('Location: ../capa-presentacion/users/user-init.html') : header('Location: ../capa-presentacion/users/user-create.html');
                break;
            default:
                header("Location: ../../index.php");
                break;
        }
    }else if(!isset($_SESSION['priv'])){
        $cuerpo  ="</nav></div></header>";
        $cuerpo .= "<div class='container'>";
        $cuerpo .="<h2 style='margin:7%;'>Error al Acceder a los permisos del usuario</h2><a href='../index.php'>Inicio</a>";
        $cuerpo .="</div>";
        echo $cuerpo;
        }
?>