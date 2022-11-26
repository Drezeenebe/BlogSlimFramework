<?php
    namespace App\Controllers;

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Slim\Views\Twig;

    class HomeController{
        function index(Request $request, Response $response) {
            $view=Twig::fromRequest($request);
            $parametros = [
                'title'=>'Pagina Principal',
                'menu'=>'Home',
            ];
            return $view->render($response,"index.html",$parametros);
        }
    }
