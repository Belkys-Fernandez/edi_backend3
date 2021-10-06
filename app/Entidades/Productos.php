<?php
 class productos{

public $id_producto;
public $categoria;
public $presentacion;

public $descripcion;
public $valor;


public static  function buscarListaProductos(){
    $accesoDatos=Acceso_datos::obtenerConexionBD();
    $consulta=$accesoDatos->prepararConsulta("SELECT * FROM productos" );
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_CLASS,'Productos'); 
}

public function buscarProductosPorId($id_producto){
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