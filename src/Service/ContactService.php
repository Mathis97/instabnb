<?php

namespace App\Service;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
class ContactService
{
    private $urlGenerator;

    public function  __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;

    }

    public function testMyService() :string
    {
        return'Ceci est un message provenant du service passé dans le controleur';
    }

}