<?php

    require_once('./parsers/PulsarSearcher.php');
    require_once('./parsers/TechnopolisSearcher.php');
    require_once('./views/components/V_SearchResult.php');

    $searchers = array(
        new TechnopolisSearcher(),
        new PulsarSearcher()
    );

    $all_results = array();

    if (isset($_GET["searchtext"]))
    {
        foreach ($searchers as $searcher)
        {
            $searcher->setSearchParams(null, null, null, $_GET["searchtext"]);
            $searcher->execute();
            $all_results = array_merge($all_results, $searcher->getResults());
        }
    }


    $rand = rand();
    echo <<<HTML
        <!DOCTYPE html>
         <meta charset="UTF-8">
            <html>
                <head>
                    <title>Търсачка за игри</title>
                    <link rel="stylesheet" type="text/css" href="mystyle.css?v=$rand">
                </head>
                <body>
                    <div class="menu">
                        <form action="index.php">
                            <input type="text" name="searchtext" value="">
                            <input type="submit" value="Търси">
                        </form>
                    </div>
                    <div class="results">
HTML;



    foreach ($all_results as $result)
    {
        $v_search_res = new V_SearchResult($result);
        $v_search_res->create();
    }


    echo <<<HTML
                    </div>
                </body>
            </html>
HTML;
