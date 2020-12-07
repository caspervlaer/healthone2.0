<?php


namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class AdminContorller extends AbstractController
{
    /**
     * @route("/medicijnen/lijst", name="lijstmedicijnen")
     */
    public function showMedicijnenAction(){
        return $this->render('medicijnen/show.html.twig');
    }
}