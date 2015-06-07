<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 24.5.2015 г.
 * Time: 12:21 ч.
 */

require_once('./views/components/V_Comp.php');

class V_SearchResult extends V_Comp
{


    public function __construct($result)
    {
        $this->result = $result;
    }


    public function create()
    {
        $img_url = $this->result->image_url;
        $desc = $this->result->description;
        $price = $this->result->price;
        $vendor_logo = $this->result->vendor_logo;

        echo <<<HTML

            <div class = "result_cell">
                <div class = "result_img">
                    <img src = "$img_url">
                </div>
                <div class = "result_desc">$desc</div>
                <div class = "result_price">
                    <img src = "$vendor_logo">
                    $price
                </div>
            </div>

HTML;

    }
}
/*        echo '';

            echo '</div>';
            echo '';
            echo '';

        echo '</div>';

        echo '<br><br>';/*



    }


}*/