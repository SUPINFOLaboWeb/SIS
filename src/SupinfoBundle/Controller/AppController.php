<?php

namespace SupinfoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    public function indexAction()
    {
        return $this->render('SupinfoBundle:App:index.html.twig');
    }
}
