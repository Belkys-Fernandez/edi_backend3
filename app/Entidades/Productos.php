<?php
 class Productos{

public $id_producto;
public $nombre;
public $categoria;
public $precio;
public $presentacion;


public static  function buscarListaProductos(){
    $accesoDatos=Acceso_datos::obtenerConexionBD();
    $consulta=$accesoDatos->prepararConsulta("SELECT * FROM productos" );
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_CLASS,'Productos'); 
}

public function buscarProductosPorId($nombre){
    $accesoDatos=Acceso_datos::obtenerConexionBD();
    $consulta=$accesoDatos->prepararConsulta("SELECT * FROM productos WHERE id_producto= $id_producto "  );
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_CLASS,'Productos'); 
}

public function buscarDescripcionProducto($id_producto){
    $accesoDatos=Acceso_datos::obtenerConexionBD();
    $consulta=$accesoDatos->prepararConsulta("SELECT descripcion FROM productos WHERE id_producto= $id_producto "  );
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_CLASS,'Productos'); 
}

public function buscarEliminar($id_producto){
    $accesoDatos=Acceso_datos::obtenerConexionBD();
     $consulta=$accesoDatos->prepararConsulta("DELETE FROM productos WHERE id_producto= $id_producto "  );
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_CLASS,'Productos'); 
}

public function buscarActualizacion($id_producto){
    $accesoDatos=Acceso_datos::obtenerConexionBD();
    $consulta=$accesoDatos->prepararConsulta("SELECT * FROM productos WHERE id_producto= $id_producto "  );
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_CLASS,'Productos'); 
}

}


?>