<?php

namespace App\Controllers;

use App\Models\ComentariosModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use App\Models\PostsModel;
use App\Models\UsuariosModel;
use App\Models\UsuariosModels;
use DateTimeImmutable;
use Slim\Routing\RouteContext;

class BlogController
{

    function index(Request $request, Response $response)
    {
        $postAll = PostsModel::select();
        $parametros = [
            'title' => 'Blog',
            'menu' => 'Blog',
            'postAll' => $postAll,
        ];
        $view = Twig::fromRequest($request);
        return $view->render($response, 'blog.html', $parametros);
    }

    function leerPost(Request $request, Response $response, array $args)
    {
        $post = PostsModel::one($args['id']);
        //$comments = ComentariosModel::select(" WHERE fk_post={$args['id']} ");
        $comments = ComentariosModel::getComentarios($args['id']);
        // now
        $date = new DateTimeImmutable($post['fecha_creacion']);
        // Prints something like: Wednesday 19th of October 2022 08:40:48 AM
        $post['fecha_creacion'] = $date->format('l jS \o\f F Y h:i:s A');
        $parametros = [
            'title' => 'Blog Leer',
            'menu' => 'Blog',
            'post' => $post,
            'comments' => $comments,
        ];
        $view = Twig::fromRequest($request);
        return $view->render($response, 'blog_leer.html', $parametros);
    }

    function setComment(Request $request, Response $response, array $args)
    {
        $data = $request->getParsedBody();
        $user = UsuariosModel::create($data);
        $data['id_usuario'] = $user[0]['id'];
        $comment = ComentariosModel::create($data);
        //SOLUCION TEMPORAL REDIRECCION
        $post = PostsModel::one($data['id_post']);
        //$comments = ComentariosModel::select(" WHERE fk_post={$args['id']} ");
        $comments = ComentariosModel::getComentarios($data['id_post']);
        // now
        $date = new DateTimeImmutable($post['fecha_creacion']);
        // Prints something like: Wednesday 19th of October 2022 08:40:48 AM
        $post['fecha_creacion'] = $date->format('l jS \o\f F Y h:i:s A');
        $parametros = [
            'title' => 'Blog Leer',
            'menu' => 'Blog',
            'post' => $post,
            'comments' => $comments,
        ];
        $view = Twig::fromRequest($request);
        return $view->render($response, 'blog_leer.html', $parametros);
    }
}
