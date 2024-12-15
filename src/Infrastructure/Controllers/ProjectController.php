<?php

namespace App\Infrastructure\Controllers;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProjectController
{

   public function get(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
   {
        $response->getBody()->write(ProjectController::class);
        return $response;
   }

}