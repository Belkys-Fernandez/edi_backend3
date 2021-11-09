<?php

    class usuario{

        public $NombreUsuario;
        public $Email;
        public $Contra;
        public $Tipo;

        public function GetNombre(){
            return $this->NombreUsuario;
        }
        public function GetEmail(){
            return $this->Email;
        }
        public function GetContra(){
            return $this->Contra;
        }
        public function GetTipo(){
            return $this->Tipo;
        }
        public function __Construct(){
            $this->NombreUsuario;
            $this->Email;
            $this->Contra;
            $this->Tipo;
        }

        public static  function buscarListaUsuario(){
            $accesoDatos=Acceso_datos::obtenerConexionBD();
            $consulta=$accesoDatos->prepararConsulta("SELECT * FROM usuario" );
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS,'usuario'); 
        }
        
        public function buscarUsuarioPorId($nombreusuario){
            $accesoDatos=Acceso_datos::obtenerConexionBD();
            $consulta=$accesoDatos->prepararConsulta("SELECT * FROM usuario WHERE nombreusuario= $nombreusuario"  );
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS,'usuario'); 
        }
        
        public function buscarDescripcionUsuario($nombreusuario){
            $accesoDatos=Acceso_datos::obtenerConexionBD();
            $consulta=$accesoDatos->prepararConsulta("SELECT contra FROM usuario WHERE nombreusuario= $nombreusuario "  );
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS,'usuario'); 
        }
        
        public function buscarEliminar($nombreusuario){
            $accesoDatos=Acceso_datos::obtenerConexionBD();
             $consulta=$accesoDatos->prepararConsulta("DELETE FROM usuario WHERE nombreusuario= $nombreusuario "  );
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS,'usuario'); 
        }
        
  
        }
        
        }
?>        