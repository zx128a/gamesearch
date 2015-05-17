<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 17.5.2015 г.
 * Time: 23:40 ч.
 */

class TechnopolisSearcher extends BaseSearcher implements ISearcher
{

    public function setSearchParams(
        $type,
        $sub_type,
        $platform,
        $search_string
    )
    {
        // TODO: Implement setSearchParams() method.
    }


    public function execute()
    {
        $dom->loadHTMLFile("http://www.pulsar.bg/index.php?route=product/isearch&search=dragon");

        $xpath = new DomXpath($dom);

        $games = $xpath->query('//*[@class="grid-box"]/div');

        for ($gameIdx = 0; $gameIdx < $games->length; $gameIdx++)
        {
            $game_node = $games->item($gameIdx);

            $image = $xpath->query('.//div[@class="image"]//img', $game_node)->item(0);
            $description = $xpath->query('.//div[@class="description"]', $game_node)->item(0)->textContent;
            $price = $xpath->query('.//div[@class="price"]', $game_node)->item(0)->textContent;

            echo '<div class="result_row">';
            echo $image->C14N(TRUE);
            echo $description;
            echo $price;

            echo '</div>';
        }

        // TODO: Implement execute() method.
    }


    public function getResults()
    {
        // TODO: Implement getResults() method.
    }
}