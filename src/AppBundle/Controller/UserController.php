<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;

class UserController extends FOSRestController
{
    /**
     * @Get("/users")
     */
    public function getUsersAction()
    {
        $data = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->handleView($this->view($data));
    }

    /**
     * @Get("/users/{id}")
     */
    public function getUserAction($id)
    {
        $data = $this->getDoctrine()->getRepository(User::class)->find($id);

        $view = $this->view($data, Response::HTTP_OK);

        return $this->handleView($view);

    }

}