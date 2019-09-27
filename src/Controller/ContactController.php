<?php


namespace App\Controller;


use App\DTO\Contact;
use App\Form\TestType;
use App\Service\ContactService;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class ContactController extends AbstractController
{
    public function __construct(ContactService $contact)
    {
        $this->contact = $contact;
    }


    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @return Response
     */

    public function index(Request $request) : Response
    {
        $contact = new Contact();
        $form  =  $this->createForm(TestType::class, $contact);
        $form->handleRequest($request);

        return $this->render('contact/index.html.twig',
            ['form'=> $form->createView()]);
    }




}