<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Announcements extends AbstractController
{

    /**
     * @Route("{_locale}/annoncements/{page}/detail",
     *     name="page",
     *     defaults={"page"=1}
     *     )
     * @param int $page
     * @return Response
     */

    public function index($page): Response
    {
        return $this->render('annonce/List.html.twig', [
            'controller_name' => 'Announcements']);


    }
}