<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends FOSRestController
{
    /**
     * @Get("/tasks")
     *
     * @return View
     */
    public function getTasksAction()
    {
        $data = $this->getDoctrine()->getRepository(Task::class)->findAll();

        return $this->view($data, $data ? Response::HTTP_OK : Response::HTTP_NO_CONTENT);
    }

    /**
     * @Get("/tasks/{id}")
     *
     * @return View
     */
    public function getTaskAction(string $id)
    {
        $data = $this->getDoctrine()->getRepository(Task::class)->find($id);

        return $this->view($data, $data ? Response::HTTP_OK : Response::HTTP_NO_CONTENT);
    }
}