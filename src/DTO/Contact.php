<?php


namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

//contient les objets
class Contact
{


    public $subject;
    public $content;
    /**
     * @Assert\Email(message="Mon email n'est pas valide", checkHost=true)
     */
    public $email;
}