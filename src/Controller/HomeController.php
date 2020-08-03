<?php

namespace App\Controller;

use App\Service\GifRandomSelector;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function index(GifRandomSelector $randomSelector)
    {
        $randomImage = $randomSelector->__invoke();
        /* dd($randomImage['data']); */
        return $this->render('home/index.html.twig', [
            'randomImage' => $randomImage['data']
        ]);
    }
}
