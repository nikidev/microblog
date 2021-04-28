<?php


namespace Microblog\Controllers;

class HomeController extends Controller
{
    public function index($request, $response)
    {
        $user = $this->container->db->table('users')->find(1);
        var_dump($user);

        die();
        return $this->container->view->render($response,'home.twig');
    }
}