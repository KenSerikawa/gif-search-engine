<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\GifSearcher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GetSearchController extends AbstractController
{
    private $searcher;

    public function __construct(GifSearcher $gifSearcher)
    {
        $this->searcher = $gifSearcher;
    }

    public function __invoke(Request $request) 
    {
        $query = $request->request->get('query');
        $results = $this->searcher->__invoke($query)['data'];
        $pagination = $this->searcher->__invoke($query)['pagination'];

        return $this->render('search/index.html.twig', [
            'query' => $query, 
            'results' => $results,
            'pagination' => $pagination
        ]);
    }
}
