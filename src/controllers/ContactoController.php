<?php
    namespace App\Controllers;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

    class ContactoController{

        function index(Request $request, Response $response) {
            $parametros = [
                'title'=>'Contacto',
                'menu'=>'Contacto',
            ];
            $view = Twig::fromRequest($request);
            return $view->render($response,'contacto.html',$parametros);
        }
    }
?>