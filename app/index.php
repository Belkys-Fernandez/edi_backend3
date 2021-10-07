<?php

error_reporting(-1);
ini_set('display_errors',1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Slim\Routing\RouteContext;

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/Acceso_datos/Acceso_datos.php';

require __DIR__ . '/Controllers/ProductosController.php';
require __DIR__ . '/Controllers/UsuariosController.php';

require __DIR__ . '/Entidades/Productos.php';
require __DIR__ . '/Entidades/Usuarios.php';

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

//Instanciar App escucha y procesa
$app = AppFactory::create();

//Middleware Error  Por defecto de Slim
//presosaciento antes y despues que llegue a la ruta
$app->addErrorMiddleware(true,true,true);

//Middleware CORS - Por defecto de Slim 
$app->add(function (Request $request, RequestHandlerInterface $handler): Response {  
    $response = $handler->handle($request);
    $requestHeaders = $request->getHeaderLine('Access-Control-Request-Headers');
    $response = $response->withHeader('Access-Control-Allow-Origin', '*');//a la peticion le agrege un dato y * podemos cambiar por la direccion de heruku
    $response = $response->withHeader('Access-Control-Allow-Methods', 'get,post,PUT,DELETE,options');//get pedir informacion, post: cuando el usuario esta cargando delicada;PUT: contenido permanente, delete :para borrar; imput: forma automatica
    $response = $response->withHeader('Access-Control-Allow-Headers', $requestHeaders);
    return $response;
});

//<<Rutas>>

//request respuesta al front, front por array:datos suelto

$app->get('/',function(Request $request, Response $response, array $args) { 
    $response->getBody()->write("APP Vida Saludable");
    return $response;
});

$app->group('/Productos', function (RouteCollectorProxy $group){
   // $group->get('[/]',\ProductosController::class.':retornarListaProductos');
    $group->get('/listaProducto',\ProductosController::class.':retornarListaProductos');
    $group->get('/ProductosPorId/{Id}',\ProductosController::class.':retornarProductosPorId');
    //verificar con el prof.
    $group->post('/descripcionProducto',\ProductosController::class.':retornarProductosDescripcion');
    $group->delete('/borrarProducto',\ProductosController::class.':retornarEliminacion');
    $group->post('/actualizarProducto',\ProductosController::class.':retornarActualizacion');
    
   
});

$app->run();





?>