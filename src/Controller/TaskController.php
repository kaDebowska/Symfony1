<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/task')]
class TaskController extends AbstractController
{
    #[Route(
        '',
        name: 'task_index',
        methods: 'GET'
    )]
    public function findAll(TaskRepository $taskRepository): Response
    {
        $tasks = $taskRepository->findAll();
        return $this->render(
            'task/index.html.twig',
            ['tasks' => $tasks]
        );
    }

    #[Route(
        '/{id}',
        name: 'task_show',
        requirements: ['id' => '[1-9]\d*'],
        methods: 'GET'
    )]
    public function show(TaskRepository $taskRepository, int $id): Response
    {
        $task = $taskRepository->find($id);

        return $this->render(
            'task/show.html.twig',
            ['task' => $task]
        );
    }
}