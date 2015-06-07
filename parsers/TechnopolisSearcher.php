<?php

require_once('./parsers/BaseSearcher.php');
require_once('./parsers/ISearcher.php');
require_once('./models/M_SearchResult.php');

class TechnopolisSearcher extends BaseSearcher implements ISearcher
{


    public function setSearchParams($type, $sub_type, $platform, $search_string)
    {
        $this->query = "http://www.technopolis.bg/bg/search?q=" . $search_string . "%3Arelevance%3Acategory%3AP11030301&text=dragon&pageselect=50";
    }


    public function execute()
    {
        $this->dom->loadHTMLFile($this->query);

        $xpath = new DomXpath($this->dom);

        $games = $xpath->query('//*[@class="product-box"]/div');

        for ($gameIdx = 0; $gameIdx < $games->length; $gameIdx++)
        {
            $game_node = $games->item($gameIdx);

            $img = $xpath->query('./figure//img', $game_node)->item(0);
            $src_attribute = $img->attributes->getNamedItem("src");
            $img_url = "http://www.technopolis.bg" . $src_attribute->textContent;
            //$src_attribute->nodeValue = $img_url;

            $search_item = new M_SearchResult();

            $search_item->image_url = $img_url;
            $search_item->description = $xpath->query('./div[@class="text"]//a', $game_node)->item(0)->textContent;
            $search_item->price = $xpath->query('.//p[@class="new-price   "]', $game_node)->item(0)->textContent;
            $search_item->vendor_logo = "http://www.technopolis.bg/medias/sys_master/images/h70/h6c/8843421057054.png";

            array_push($this->results, $search_item);
        }


    }


}