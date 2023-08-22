<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
    private array $message = ['hello', 'hi', 'morning'];
    #[Route(path: '/{limit<\d+>?3}', name: 'app_index')]
    public function index(int $limit): Response
    {

        return new Response(implode(',',array_slice($this->message,0,$limit))
        );
    }


#[Route('/message/{id<\d+>}', name: 'show-one')]
    public function showOne(int $id): Response
    {
        return new Response($this->message[$id]);
    }
}