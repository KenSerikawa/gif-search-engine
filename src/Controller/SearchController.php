<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\GifSearcher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    public function index(GifSearcher $gifSearcher, Request $request)
    {
        $query = $request->request->get('query');
        $results = $gifSearcher($query)['data'];
        $pagination = $gifSearcher($query)['pagination'];

        return $this->render('search/index.html.twig', [
            'query' => $query, 
            'results' => $results,
            'pagination' => $pagination
        ]);
    }
}
