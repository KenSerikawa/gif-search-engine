<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\GifSearchDigger;
use Symfony\Component\HttpFoundation\JsonResponse;

class DiggerController extends AbstractController
{
    public function getMore(Request $request, GifSearchDigger $digger)
    {
        $query = $request->request->get('query');
        $offset = $request->request->get('offset');
        $data = $digger->__invoke($query, $offset);
        
        return new JsonResponse($data);
    }
}
