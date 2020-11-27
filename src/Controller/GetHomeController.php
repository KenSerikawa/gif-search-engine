<?php

namespace App\Controller;

use App\Service\GifRandomSelector;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GetHomeController extends AbstractController
{
    public function __construct(GifRandomSelector $randomSelector)
    {
        $this->randomSelector = $randomSelector;
    }
    public function __invoke()
    {
        $randomImage = $this->randomSelector->__invoke();

        return $this->render('home/index.html.twig', [
            'randomImage' => $randomImage['data']
        ]);
    }
}
