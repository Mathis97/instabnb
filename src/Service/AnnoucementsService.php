<?php


namespace App\Service;


use App\Repository\AnnouncementRepository;
use Doctrine\Common\Persistence\ObjectManager;

class AnnoucementsService
{


    private $entityManager;
    /**
     * @var AnnouncementRepository
     */
    private $announcementRepository;

    public function __construct(ObjectManager $entityManager, AnnouncementRepository $announcementRepository)
    {
        $this->entityManager = $entityManager;
        $this->announcementRepository = $announcementRepository;
    }

    public function listAnnoucements($limit)

    {
        $data = $this->announcementRepository->findByExampleField($limit);
        $this->entityManager->flush($data);
    return $data;
    }

}