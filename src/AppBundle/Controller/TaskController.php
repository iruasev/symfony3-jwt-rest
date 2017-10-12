<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Task;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends FOSRestController
{
    /**
     * @Get("/tasks")
    */
    public function getTasksAction()
    {
        $data = $this->getDoctrine()->getRepository(Task::class)->findAll();

        return $this->handleView($this->view($data, Response::HTTP_OK));
    }

    /**
     * @Get("/tasks/{id}")
     */
    public function getTaskAction($id)
    {
        $data = $this->getDoctrine()->getRepository(Task::class)->find($id);

        return $this->handleView($this->view($data, $data ? Response::HTTP_OK : Response::HTTP_NOT_FOUND));
    }
}