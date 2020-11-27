<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Service\GifSearchDigger;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetMoreResultsController extends AbstractController
{
    public $digger; 

    public function __construct(GifSearchDigger $digger)
    {
        $this->digger = $digger;
    }

    public function __invoke(Request $request)
    {
        $data = $this->digger->__invoke(
            $request->request->get('query'),
            $request->request->get('offset')
        );
        
        return new JsonResponse($data);
    }
}
