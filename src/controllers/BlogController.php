<?php
    namespace App\Controllers;

use App\Models\ComentariosModel;
use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Slim\Views\Twig;
    use App\Models\PostsModel;

    class BlogController{

        function index(Request $request, Response $response) {
            $one=PostsModel::one(1);
            $parametros = [
                'title'=>'Blog',
                'menu'=>'Blog',
            ];
            $view = Twig::fromRequest($request);
            return $view->render($response,'blog.html',$parametros);
        }
    
        function leerPost(Request $request, Response $response) {
            $post=PostsModel::one(1);
            $comments=ComentariosModel::select(" WHERE fk_post=1 ");
            ComentariosModel::select();
            $parametros = [
                'title'=>'Blog Leer',
                'menu'=>'Blog',
                'post'=>$post,
                'comments'=>$comments,
            ];
            $view = Twig::fromRequest($request);
            return $view->render($response,'blog_leer.html',$parametros);
        }
    }
