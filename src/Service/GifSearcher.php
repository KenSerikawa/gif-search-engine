<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

final class GifSearcher 
{
    private $parameters;

    public function __construct(ContainerBagInterface $parameters)
    {
        $this->parameters = $parameters;
    }

    public function __invoke($query)
    {
        $apiKey = $this->parameters->get('giphy.api.key');
        $query = str_replace(' ', '+', $query);
        $url = "http://api.giphy.com/v1/gifs/search?q=" . $query . "&api_key=" . $apiKey . "&limit=30";
        return json_decode(file_get_contents($url), true);
    }
}
