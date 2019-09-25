<?php

namespace App\Controller;

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
     * @Route("/product", name="product")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $product = new Product();
        $form  =  $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form ->isValid())
        {
            return $this->redirectToRoute('product');
        }

        return $this->render('product/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
