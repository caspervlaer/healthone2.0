<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @route("/medicijnen/medicijn", name="lijstmedicijnen")
     */
    public function showMedicijnenAction2(){
        return $this->render('medicijnen/med.html.twig');
    }

}