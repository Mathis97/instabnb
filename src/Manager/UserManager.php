<?php


namespace App\Manager;


use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserManager
{
    /**
     * @var UserPasswordEncoderTest
     */
    private $passwordEncoder;

    /**
     * @var ObjectManager
     */
    private $objectManager;

    public function __construct(UserPasswordEncoderInterface     $passwordEncoder, ObjectManager $objectManager)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->objectManager = $objectManager;
    }

    public function save(User $user) :void
    {
        $encodePassword= $this->passwordEncoder->encodePassword($user, $user->getPassword());
        $user->setPassword($encodePassword);
        $this->objectManager->persist($user);
        $this->objectManager->flush();

        //dump($encodePassword);die;
    }
}