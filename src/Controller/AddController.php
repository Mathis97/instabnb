<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddController extends AbstractController
{
    /**
     * @Route("/add",
     *     name="add",
     *     methods={"GET", "POST"}
     *     )
     *
     */

    public function index(): Response
    {
        return $this->render('annonce/add.html.twig', [
            'controller_name' => 'AddController']);
    }
}