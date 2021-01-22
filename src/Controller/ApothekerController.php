<?php

namespace App\Controller;

use App\Entity\Recept;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ApothekerController extends AbstractController{

    /**
     * @Route("/listRecept", name="listRecept")
     */
    public function showRecept(EntityManagerInterface $entitymanager){
        $recepten = $entitymanager->getRepository(Recept::class)->findAll();
        return $this->render('recepten/show.html.twig',[
            'recept'=> $recepten
        ]);
    }

}
