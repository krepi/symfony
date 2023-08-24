<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    private array $message = [
        ['message' => 'hello', 'created' => '2023/06/12'],
        ['message' => 'hi', 'created' => '2023/04/12'],
        ['message' => 'morning', 'created' => '2021/05/12']
    ];

    #[Route(path: '/{limit<\d+>?3}', name: 'app_index')]
    public function index(int $limit): Response
    {
        return $this->render('hello/index.html.twig',
            [
                'messages' => $this->message,
                'limit' => $limit
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