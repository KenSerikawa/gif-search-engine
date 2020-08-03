<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

final class GifRandomSelector 
{
    private $parameters;

    public function __construct(ContainerBagInterface $parameters)
    {
        $this->parameters = $parameters;
    }

    public function __invoke()
    {
        $apiKey = $this->parameters->get('giphy.api.key');
        $url = "http://api.giphy.com/v1/gifs/random?api_key=" . $apiKey;
        return json_decode(file_get_contents($url), true);
    }
}