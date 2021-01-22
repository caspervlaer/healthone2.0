<?php


namespace App\Controller;

use App\Entity\Medicijnen;

use App\Entity\Patienten;
use App\Entity\Recept;
use App\Entity\User;
use App\Form\MedicijnenFormType;
use App\Form\PatientenFormType;
use App\Form\ReceptenFormType;
use App\Form\UsersFormType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminContorller extends AbstractController
{
    /**
     * @Route("/mainpage", name="listmedicijnen")
     */
    public function showMedicijnenAction(EntityManagerInterface $entitymanager){
        $medicijnen = $entitymanager->getRepository(Medicijnen::class)->findAll();
        return $this->render('medicijnen/show.html.twig',[
            'medicijnen'=> $medicijnen
        ]);
    }

    /**
     * @Route ("/patientAdd", name="addPatient")
     */
    public function addPatient(Request $request):Response{
        $pat = new Patienten();
        $form = $this->createForm(PatientenFormType::class, $pat);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $pat = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pat);
            $entityManager->flush();

            return $this->redirectToRoute('listPatienten');
        }

        return $this->render('medicijnen/medform.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route ("/userForm", name="userForm")
     */
    public function userForm(UserPasswordEncoderInterface $passwordEncoder,Request $request):Response{
        $user = new User();
        $this->passwordEncoder = $passwordEncoder;
        $form = $this->createForm(UsersFormType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $user->setRoles(["ROLE_USER"]);
            $user->setPassword($this->passwordEncoder->encodePassword($user,$user->getPassword()));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('listmedicijnen');
        }

        return $this->render('medicijnen/medform.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/medForm", name="medicijnenForm")
     */
    public function medicijnenFormAction(Request $request): Response{
        $med = new Medicijnen();
        $form = $this->createForm(MedicijnenFormType::class, $med);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $med = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($med);
            $entityManager->flush();

            return $this->redirectToRoute('listmedicijnen');
        }

        return $this->render('medicijnen/medform.html.twig',[
            'form' => $form->createView(),
            ]);
    }

    /**
     * @Route ("/{id}/deletemed", name="deleteMedicijnen")
     */
    public function deleteMedicijnen($id, EntityManagerInterface $entitymanager){
        $medicijn = $entitymanager->getRepository(Medicijnen::class)->find($id);
        $entitymanager->remove($medicijn);
        $entitymanager->flush();
        return $this->redirectToRoute('listmedicijnen');
    }

    /**
     * @Route ("/{id}/deletepat", name="deletePatienten")
     */
    public function deletePatienten($id, EntityManagerInterface $entityManager){
        $patient = $entityManager->getRepository(Patienten::class)->find($id);
        $entityManager->remove($patient);
        $entityManager->flush();
        return $this->redirectToRoute('listPatienten');
    }

    /**
     * @Route ("/{id}/updateMed", name="updateMedicijnen")
     */
    public function updateMedicijnen($id, EntityManagerInterface $entityManager, Request $request){
        $entityManager = $this->getDoctrine()->getManager();
        $medicijn = $entityManager->getRepository(Medicijnen::class)->find($id);
        $form = $this->createForm(MedicijnenFormType::class, $medicijn);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $med = $form->getData();

            $medicijn->setName($med->getName());
            $medicijn->setSideEffect($med->getSideEffect());
            $medicijn->setBenefits($med->getBenefits());
            $medicijn->setCompensated($med->getCompensated());
            $entityManager->flush();

            return $this->redirectToRoute('listmedicijnen');

        }

        return $this->render('medicijnen/medform.html.twig',[
            'form' => $form->createView(),
        ]);
    }
}