<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DetailController extends AbstractController
{
    /**
     * @Route("{page}/detail",
     *     name="detail",
     *     defaults={"page"=1},
     *     requirements={"page"="[0-9]+"}
     *     )
     * @param int $page
     * @return Response
     *
     */

    public function index($page): Response
    {
        $annonces = [];
        for ($i = 0; $i < 10; $i++) {
            $annonces[] = [
                'id' => $i,
                "title" => "blabla",
                "content" => "on",
                "price" => $i ** 3,
                "createDate" => new \DateTime()
            ];
        }
            return $this->render('annonce/DetailController.html.twig', [
                'controller_name' => 'DetailController',
                'annonces' => $annonces]);
        }
    }

