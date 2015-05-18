<?php

require_once('./parsers/BaseSearcher.php');
require_once('./parsers/ISearcher.php');
require_once('./models/SearchItem.php');

class PulsarSearcher extends BaseSearcher implements ISearcher
{


    public function setSearchParams($type, $sub_type, $platform, $search_string)
    {
        $this->query = "http://www.pulsar.bg/index.php?route=product/isearch&search=" . $search_string;
    }


    public function execute()
    {
        $this->dom->loadHTMLFile($this->query);

        $xpath = new DomXpath($this->dom);

        $games = $xpath->query('//*[@class="grid-box"]/div');

        for ($gameIdx = 0; $gameIdx < $games->length; $gameIdx++)
        {
            echo $gameIdx;
            $game_node = $games->item($gameIdx);

            $search_item = new SearchItem();

            $search_item->image_url = $xpath->query('.//div[@class="image"]//img', $game_node)->item(0);
            $search_item->description = $xpath->query('.//div[@class="description"]', $game_node)->item(0)->textContent;
            $search_item->price = $xpath->query('.//div[@class="price"]', $game_node)->item(0)->textContent;

            array_push($this->results, $search_item);
        }
    }

}