<?php

    class Usuarios{

        public $NombreUsuario;
        public $Email;
        public $Contra;
        public $Tipo;

       
      

        public static  function buscarListaUsuario(){
            $accesoDatos=Acceso_datos::obtenerConexionBD();
            $consulta=$accesoDatos->prepararConsulta("SELECT * FROM usuario" );
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS,'Usuarios'); 
        }
        
        public function buscarUsuarioPorId($nombreusuario){
            $accesoDatos=Acceso_datos::obtenerConexionBD();
            $consulta=$accesoDatos->prepararConsulta("SELECT * FROM usuario WHERE nombreusuario= $nombreusuario"  );
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS,'Usuarios'); 
        }
        
        public function buscarDescripcionUsuario($nombreusuario){
            $accesoDatos=Acceso_datos::obtenerConexionBD();
            $consulta=$accesoDatos->prepararConsulta("SELECT contra FROM usuario WHERE nombreusuario= $nombreusuario "  );
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS,'Usuarios'); 
        }
        
        public function buscarEliminar($nombreusuario){
            $accesoDatos=Acceso_datos::obtenerConexionBD();
             $consulta=$accesoDatos->prepararConsulta("DELETE FROM usuario WHERE nombreusuario= $nombreusuario "  );
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS,'Usuarios'); 
        }
        
  
        }
        
        }
?>        