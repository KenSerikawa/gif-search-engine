<?php

declare(strict_types=1);

namespace App\Service;

final class GifSearcher 
{
    public function __invoke($query)
    {
        $url = "http://api.giphy.com/v1/gifs/search?q=" . $query . "&api_key=FLbs8nIbeKunlATbPPW2nq2wEYVQ3kw9&limit=50";
        return json_decode(file_get_contents($url), true);
    }
}