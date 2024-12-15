<?php

namespace App\Infrastructure\Controllers;

use App\Infrastructure\Repository\UserRepository\UsersRepository;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class UsersController
{

   public function addUser(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
   {
        (new UsersRepository)->insert($request->getParsedBody()["name"], $request->getParsedBody()["age"]);
        $response->getBody()->write("UserCreated");
        return $response;
   }

   public function getAll(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
    $users = (new UsersRepository)->get();
    $response = $response->withHeader("Content-Type", 'application/json');
    $response->getBody()->write(json_encode($users));
    return $response;
   }
}