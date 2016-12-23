<?php

namespace AppBundle\Controller\Api;

use AppBundle\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/api/task")
 */
class TaskController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $tasks = array('1', '2', '3');
        return new JsonResponse($tasks);
    }

    /**
     * @Route("/create/{name}")
     */
    public function createAction($name)
    {
        $task = new Task($name);

        $em = $this->getDoctrine()->getManager();
        $em->persist($task);
        $em->flush();

        $tasks = array('status' => 'success');
        return new JsonResponse($tasks);
    }
}
