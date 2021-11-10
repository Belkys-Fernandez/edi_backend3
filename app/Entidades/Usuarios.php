<?php

    class Usuarios{

        public $usuario;
        public $nombre;
        public $apellido;
        public $sexo;

       
      

        public static  function buscarListaUsuario(){
            $accesoDatos=Acceso_datos::obtenerConexionBD();
            $consulta=$accesoDatos->prepararConsulta("SELECT * FROM usuario" );
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS,'Usuarios'); 
        }
        
        public function buscarUsuarioPorId($usuario){
            $accesoDatos=Acceso_datos::obtenerConexionBD();
            $consulta=$accesoDatos->prepararConsulta("SELECT * FROM usuario WHERE usuario= $usuario"  );
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS,'Usuarios'); 
        }
        
        public function buscarDescripcionUsuario($usuario){
            $accesoDatos=Acceso_datos::obtenerConexionBD();
            $consulta=$accesoDatos->prepararConsulta("SELECT contra FROM usuario WHERE usuario= $usuario "  );
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS,'Usuarios'); 
        }
        
        public function buscarEliminar($usuario){
            $accesoDatos=Acceso_datos::obtenerConexionBD();
             $consulta=$accesoDatos->prepararConsulta("DELETE FROM usuario WHERE usuario= $usuario "  );
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS,'Usuarios'); 
        }
        
  
     }
        
        
?>        