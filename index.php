<?php

    require_once('./parsers/PulsarSearcher.php');
    require_once('./parsers/TechnopolisSearcher.php');
    require_once('./views/components/V_SearchResult.php');

    $searchers = array(
        //new TechnopolisSearcher(),
        new PulsarSearcher()
    );

    $all_results = array();

    $game_name = "assassin";

    foreach ($searchers as $searcher)
    {
        $searcher->setSearchParams(null, null, null, $game_name);
        $searcher->execute();
        $all_results = array_merge($all_results, $searcher->getResults());
    }


    <!DOCTYPE html>
    <html>
        <head>
            <title>Page Title</title>
        </head>
        <body>
        </body>
    </html>


    foreach ($all_results as $result)
    {
        $v_search_res = new V_SearchResult($result);
        $v_search_res->create();
    }






