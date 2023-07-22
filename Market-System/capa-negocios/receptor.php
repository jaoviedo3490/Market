<?php
@include('../capa-datos/conexion.php');
    if(!isset($_SESSION['session'])){
        //header('Location: ../../capa-presentacion/users/user-init.html');
    }
    class Usuarios{
        private $_ID;
        private $_Nombre;
        private $_Contraseña;
        private $_Privilegios;
        
        public function Create_Users_SQL($Nombre,$Contraseña,$Privilegios){
            $con = new Conexion();
            $value_bool = null;
            $cadena = "INSERT INTO Usuarios(Nombre,Contraseña,Privilegios) VALUES('$Nombre','$Contraseña','$Privilegios');";
            $datos = ($con->getBD())->query($cadena);
            $datos==false ? $value_bool = false : $value_bool = true;
            return $value_bool;
        }
        public function Extract_Users_SQL($ID){
            $value_bool = null;
            $cadena = "SELECT * FROM Usuarios WHERE ID = ".$ID.";";
            $datos = ($con->getBD())->query($cadena);
            foreach($datos as $data){
                $this->_ID=$data['ID'];
                $this->_Nombre=$data['Nombre'];
                $this->_Contraseña=$data['Contraseña'];
                $this->_Privilegios=$data['Privilegios'];
            }
            $datos==false ? $value_bool = false : $value_bool = true;
            return $value_bool;
        }
        public function Extract_User_SQL($dato){
            $user = array();
            $value_bool = null;
            $con = new Conexion();
            $cadena = "SELECT * FROM usuarios WHERE Nombre = '".$dato."';";
            $datos = ($con->getBD())->query($cadena);
            foreach($datos as $data){
                $user[0]=$data['ID'];
                $user[1]=$data['Nombre'];
                $user[2]=$data['Contraseña'];
                $user[3]=$data['Privilegios'];
                $user[4]=$data['Estado'];
            }if($datos==false){
                $value_bool = false;
                return $value_bool;
            }else if($datos==true) return $user;
        }
        public function Delete_Users_SQL($ID){
            $value_bool = null;
            $cadena = "DELETE * FROM Usuarios WHERE ID=".$ID.";";
            $datos = $bd->query($cadena);
            $datos==false ? $value_bool = false : $value_bool = true;
            return $value_bool;
        }
        public function Update_Users_SQL($ID){
            $value_bool = null;
            $cadena = "UPDATE Usuarios SET Nombre = '$this->_Nombre' , Contraseña = '$this->_Contraseña' , Privilegios = '$this->_Privilegios' WHERE ID = $this->_ID";
            $datos = $bd->query($cadena);
            $datos==false ? $value_bool = false : $value_bool = true;
            return $value_bool;
        }
        public function extract_all_users(){
            $id = array(array());
            $i = 0;
            $value_bool = null;
            $con = new Conexion();
            $cadena = "SELECT * FROM usuarios WHERE Privilegios LIKE 'empleado' AND Estado LIKE 'Activx'";
            $datos = ($con->getBD())->query($cadena);
            foreach($datos as $data){
                $id[$i][0]=$data['ID'];
                $id[$i][1]=$data['Nombre'];
                $id[$i][2]=$data['Privilegios'];
                $i+=1;
            }
            $id==false ? $value_bool = false : $value_bool = true;
            return $id;
        }
        public function extract_all_suspend_users(){
            $id = array(array());
            $i = 0;
            $value_bool = null;
            $con = new Conexion();
            $cadena = "SELECT * FROM usuarios WHERE Privilegios LIKE 'Empleado'  AND Estado LIKE 'Suspendida'";
            $datos = ($con->getBD())->query($cadena);
            foreach($datos as $data){
                $id[$i][0]=$data['ID'];
                $id[$i][1]=$data['Nombre'];
                $id[$i][2]=$data['Privilegios'];
                $i+=1;
            }
            $id==false ? $value_bool = false : $value_bool = true;
            return $id;
        }
        public function getID(){ return $this->_ID; }
        public function getNombre() { return $this->_Nombre; }
        public function getContraseña() { return $this->_Contraseña; }
        public function getPrivilegios() { return $this->_Privilegios; }
        public function setID($id){ $this->ID = $id;}
        public function setNombre($nombre) { $this->_Nombre = $nombre;}
        public function setContraseña($contraseña){ $this->_Contraseña = $contraseña; }
        public function setPrivilegios($privilegios){ $this->_Privilegios = $privilegios; }
    }
    class Productos{
        private $_ID;
        private $_Nombre;
        private $_Precio;
        private $_Stock;
        private $_Referencia;
        private $_Vendidos;
        private $_Categoria;
        private $_Imagen;

        public function Create_Product_SQL($Nombre,$Precio,$Referencia,$Stock,$Ruta,$Vendidos,$Categoria){
            $productos_value = null;
            $con = new Conexion();
            $cadena = "INSERT INTO Productos(Nombre,Precio,Referencia,Stock,Imagen,Vendidos,Categoria) 
            VALUES('$Nombre','$Precio','$Referencia','$Stock','$Ruta','$Vendidos','$Categoria');";
            $datos = ($con->getBD())->query($cadena);
            $datos == false ? $productos_value = false : $productos_value = true;
            return $productos_value;
        }
        public function Delete_Product_SQL($ID){
            
            $productos_value = null;
            $cadena = "DELETE * FROM Productos WHERE ID = ".$ID.";";
            $datos = $bd->query($cadena);
            $datos == false ? $productos_value = false : $productos_value = true;
            return $productos_value;
        }
        public function Update_Product_SQL($ID){
            $productos_value = null;
            $cadena = "UPDATE Productos SET Nombre = $this->_Nombre , Precio = $this->_Precio , Referencia = $this->_Referencia , Stock = $this->_Stock , Vendidos = $this->_Vendidos WHERE ID = $ID";
            $datos = $bd->query($cadena);
            $datos == false ? $productos_value = false : $productos_value = true;
            return $productos_value;
        }
        public function Extract_Products_SQL($ID,$Categoria){
            $product = array();
            $value_bool = null;
            $con = new Conexion();
            @$cadena = "SELECT * FROM productos WHERE ID = '".$ID."'";
            $datos = ($con->getBD())->query($cadena);
            foreach($datos as $data){
                $product[0]=$data['ID'];
                $product[1]=$data['Nombre'];
                $product[2]=$data['Precio'];
                $product[3]=$data['Stock'];
                $product[4]=$data['Referencia'];
                $product[5]=$data['Vendidos'];
                $product[6]=$data['Categoria'];
                $product[7]=$data['Imagen'];
            }
            $datos==false ? $value_bool = false : $value_bool = true;
            return $product;
        }public function Extract_All_Products($Category){
            $id = array();
            $i = 0;
            $value_bool = null;
            $con = new Conexion();
            $cadena = "SELECT ID FROM Productos WHERE Categoria LIKE '%$Category%'";
            $datos = ($con->getBD())->query($cadena);
            foreach($datos as $data){
                $id[$i]=$data['ID'];
                $i+=1;
            }
            $id==false ? $value_bool = false : $value_bool = true;
            return $id;
        }public function Extract_All_Data_Object($dato){
            $product = array();
            $value_bool = null;
            $con = new Conexion();
            @$cadena = "SELECT * FROM Productos WHERE Nombre LIKE '%".$dato."%'";
            $datos = ($con->getBD())->query($cadena);
            foreach($datos as $data){
                $product[0]=$data['ID'];
                $product[1]=$data['Nombre'];
                $product[2]=$data['Categoria'];
            }
            $datos==false ? $value_bool = false : $value_bool = true;
            return $product;
        }
        public function Extract_All_Data_Object_(){
            $id = array(array());
            $i = 0;
            $value_bool = null;
            $con = new Conexion();
            @$cadena = "SELECT ID , Nombre, Categoria FROM Productos ORDER BY Nombre";
            $datos = ($con->getBD())->query($cadena);
            foreach($datos as $data){
                $id[$i][0]=$data['ID'];
                $id[$i][1]=$data['Nombre'];
                $id[$i][2]=$data['Categoria'];
                $i+=1;
            }
            $id==false ? $value_bool = false : $value_bool = true;
            return $id;
            
        }
        public function Delete_Product($dato){
            $productos_value = null;
            $con = new Conexion();
            $cadena = "DELETE FROM Productos WHERE ID = '$dato'";
            $datos = ($con->getBD())->query($cadena);
            $datos == false ? $productos_value = false : $productos_value = true;
            return $productos_value;
        }
    }
?>