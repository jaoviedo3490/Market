<?php
class Conexion
{
    private $servidor = "127.0.0.1";
    private $base = "market";
    private $usuario = "root";
    public  $bd = "";
    public function getBD()
    {
        return $this->bd;
    }
    public function __construct()
    {
        try {
            $this->bd = new PDO("mysql:host=$this->servidor;dbname=$this->base;", $this->usuario, "");
            return $this->bd;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}

 
?>
