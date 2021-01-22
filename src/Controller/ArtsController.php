<?php

namespace App\Controller;

use App\Entity\Patienten;
use App\Entity\Recept;
use App\Form\ReceptenFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtsController extends AbstractController
{
/**
 * @Route ("/listPatienten", name="listPatienten")
 */
public function showPatientenAction(EntityManagerInterface $entityManager){
    $patienten = $entityManager->getRepository(Patienten::class)->findAll();
    return $this->render('patienten/patient.html.twig',[
        'patienten'=> $patienten
    ]);
}

    /**
     * @Route("/{id}/addRecept", name="addRecept")
     */
    public function addRecept($id,EntityManagerInterface $entityManager,Request $request): Response{
        $rec = new Recept();
        $form = $this->createForm(ReceptenFormType::class, $rec);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $med = $form->getData();
            $pat = $entityManager->getRepository(patienten::class)->find($id);
            $med->setPatienten($pat);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($med);
            $entityManager->flush();

            return $this->redirectToRoute('listmedicijnen');
        }

        return $this->render('medicijnen/medform.html.twig',[
            'form' => $form->createView(),
        ]);
    }
}
