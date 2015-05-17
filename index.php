<?php

    libxml_use_internal_errors(true);

    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->substituteEntities = TRUE;

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



    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->substituteEntities = TRUE;

    $dom->loadHTMLFile("http://www.technopolis.bg/bg/search?q=dragon%3Arelevance%3Acategory%3AP11030301&text=dragon&pageselect=50");

    $xpath = new DomXpath($dom);

    $games = $xpath->query('//*[@class="product-box"]/div');
    //echo $games->item(0)->C14N(TRUE);

    for ($gameIdx = 0; $gameIdx < $games->length; $gameIdx++)
    {
        $game_node = $games->item($gameIdx);

        $img = $xpath->query('./figure//img', $game_node)->item(0);
        $src_attribute = $img->attributes->getNamedItem("src");
        $img_url = "http://www.technopolis.bg" . $src_attribute->textContent;
        $src_attribute->nodeValue = $img_url;

        echo $img->C14N(TRUE);
        echo $text = $xpath->query('./div[@class="text"]//a', $game_node)->item(0)->textContent;
        echo $xpath->query('.//p[@class="new-price   "]', $game_node)->item(0)->textContent;

        echo "<br><br>";

    }
