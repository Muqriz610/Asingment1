<?php

function getWiredHeadlines() {
    $url = "https://www.wired.com/";
    $html = file_get_contents($url);

    $dom = new DOMDocument();
    @$dom->loadHTML($html);

    $headlines = [];

    // Find the articles
    $articles = $dom->getElementsByTagName('article');

    foreach ($articles as $article) {
        $headlineElement = $article->getElementsByTagName('h2')->item(0);
        $dateElement = $article->getElementsByTagName('time')->item(0);

        if ($headlineElement && $dateElement) {
            $title = $headlineElement->textContent;
            $link = $headlineElement->getElementsByTagName('a')->item(0)->getAttribute('href');
            $published = $dateElement->getAttribute('datetime');

            // Check if the article is published on or after January 1, 2022
            if (strtotime($published) >= strtotime('2022-01-01')) {
                $headlines[] = ["title" => $title, "link" => $link, "published" => $published];
            }
        }
    }

    // Sort headlines by publish date in descending order
    usort($headlines, function($a, $b) {
        return strtotime($b['published']) - strtotime($a['published']);
    });

    return $headlines;
}

$wiredHeadlines = getWiredHeadlines();

?>
