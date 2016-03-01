<?php

namespace SupinfoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    public function indexAction(Request $request)
    {
        if ($this->getUser() === null) {
            die("403");
        }
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        // var_dump($user);
        $postRepo = $em->getRepository("SupinfoBundle:Post");

        $posts = $postRepo->getNewsForCampus($this->getUser()->getCampus());

        return new JsonResponse($posts);
    }
}