<?php


namespace Microblog\Controllers;

class HomeController extends Controller
{
    public function index($request, $response)
    {
        return $this->container->view->render($response,'home.twig');
    }
}