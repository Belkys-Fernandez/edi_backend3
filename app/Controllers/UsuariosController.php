<?php


    class usuarioController{

        public static function retornarListaUsuario($request,$response,$args){
            $listaUsuario=Usuarios::buscarListaUsuario();
            $response->getBody()->write(json_encode($listaUsuario));
            return $response;
        }
    

        public  function retornarUsuarioPorId($request,$response,$args){
            $onjetoUsuario=new Usuarios;
            $Usuario=$onjetoUsuario->buscarUsuarioPorId($args['Id']);
            $response->getBody()->write(json_encode($Usuario));
            return $response;
        }
        
        public  function retornarUsuarioDescripcion($request,$response,$args){
            $json = $request->getBody();
            $json_id = json_decode($json,true);
            $onjetoUsuario=new Usuarios;
            $descripcionUsuario=$onjetoUsuario->buscarDescripcionUsuario($json_id['nombreusuario']);
            $response->getBody()->write(json_encode($descripcionUsuario));
            return $response;
        }

        public  function retornarEliminacion($request,$response,$args){
            $json = $request->getBody();
            $json_id = json_decode($json,true);
            $onjetoUsuario=new Usuarios;
            $descripcionUsuario=$onjetoUsuario->buscarEliminar($json_id['nombreusuario']);
            $response->getBody()->write(json_encode($descripcionUsuario));
            return $response;
        }
        public  function retornarActualizacion($request,$response,$args){
            $json = $request->getBody();
            $json_id = json_decode($json,true);
            $onjetoUsuario=new Usuarios;
            $descripcionUsuario=$onjetoUsuario->buscarActualizacion($json_id['nombreusuario']);
            $response->getBody()->write(json_encode($descripcionUsuario));
            return $response;
        }



    }


?>