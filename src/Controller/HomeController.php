<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/{_locale}",
     *     name="home",
     *     defaults={"page"=1}
     *     )
     */

    public function index(): Response
    {
        $annonces=[["id"=>1,"title"=>"blabla","content"=>"off","price"=>10,"createDate"=>new\DateTime()],
            ["id"=>2,"title"=>"blabla","content"=>"on","price"=>8,"createDate"=>new\DateTime()]];

        return $this->render('annonce/HomeController.html.twig', [
            'controller_name' => 'HomeController',
            'annonces'=> $annonces
            ]);

    }



}