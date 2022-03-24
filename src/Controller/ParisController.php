<?php

namespace App\Controller;

use App\Entity\RoomsParis;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParisController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/paris', name: 'app_paris')]
    public function index(): Response
    {
        $roomParis = $this->entityManager->getRepository(RoomsParis::class)->findAll();
        
        return $this->render('paris/index.html.twig', [

            'room' => $roomParis
        ]);
    }
}
