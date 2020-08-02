<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\GifSearcher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    public function index(string $query, GifSearcher $gifSearcher)
    {
        $results = $gifSearcher($query)['data'];
        return $this->render('search/index.html.twig', [
            'results' => $results
        ]);
    }
}
