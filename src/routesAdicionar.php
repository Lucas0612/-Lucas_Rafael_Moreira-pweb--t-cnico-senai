<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/adicionar/', function (Request $request, Response $response, array $args) use ($container) {

        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/adicionar/' route");

        return $container->get('renderer')->render($response, 'adicionar.phtml', $args);


    });

    $app->post('/adicionar/', function (Request $request, Response $response, array $args) use ($container) {

        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/adicionar/' route");

        $conexao = $container['pdo'];

        
        $adicionar = $_POST;

        $resultSet = $conexao->query('INSERT INTO carro WHERE('.$adicionar['id'].', '.$adicionar['modelo'].', '.$adicionar['marca'].', '.$adicionar['ano'].')')->fetchAll();

        

        print_r($adicionar);


        // Render index view
        return $container->get('renderer')->render($response, 'adicionar.phtml', $args);


    });

};
