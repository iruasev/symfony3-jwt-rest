<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;

class UserController extends FOSRestController
{

    /**
     * @return View
     */
    public function getUsersAction()
    {
        $data = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->view($data, $data ? Response::HTTP_OK : Response::HTTP_NO_CONTENT);
    }

    /**
     * @param $id
     *
     * @return View
     */
    public function getUserAction($id)
    {
        $data = $this->getDoctrine()->getRepository(User::class)->find($id);

        return $this->view($data, $data ? Response::HTTP_OK : Response::HTTP_NO_CONTENT);
    }

}