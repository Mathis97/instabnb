<?php

namespace App\Controller;

use App\Entity\Announcement;
use App\Repository\AnnouncementRepository;

use App\Service\ContactService;
use Symfony\Component\Form\FormTypeInterface;
use App\DTO\Product;
use App\Form\ProductType;
use App\Form\TestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @var ContactService
     */
    private $announcementsService;

    public function __construct(AnnouncementRepository $announcementsService)
    {

        $this->announcementsService = $announcementsService;
    }


    /**
     * @Route("{_locale}/product", name="product")
     * @param Request $request
     * @return Response
     */


    public function index(Request $request)
    {
        $product= new Product();

        $form  =  $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form ->isValid())
        {

            $a = new Announcement();// instantiation d'une nouvelle entité "announcement"
            $a->setTitle($product->getTitle());//injection des données du formulaire dans l'entité locale ($a)
            $a->setCreatedAt(new \DateTime());
            $a->setContent($product->getContent());
            $a->setPrice($product->getPrice());

            $entitManager = $this->getDoctrine()->getManager();//création de la requete "insert"
            $entitManager->persist($a);//préparation de l'injection
            $entitManager->flush();//envoi de la requête
            return $this->redirectToRoute('product');

        }

        return $this->render('product/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
