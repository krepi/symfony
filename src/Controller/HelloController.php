<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    private array $message = ['hello', 'hi', 'morning'];

    #[Route(path: '/{limit<\d+>?3}', name: 'app_index')]
    public function index(int $limit): Response
    {
        return $this->render('hello/index.html.twig',
            [
                'messages' =>  array_slice($this->message, 0, $limit)
            ]
        );

    }


    #[Route('/message/{id<\d+>}', name: 'show-one')]
    public function showOne(int $id): Response
    {
        return $this->render(
            'hello/show_one.html.twig',
            [
                'message' => $this->message[$id]
            ]
        );

    }
}