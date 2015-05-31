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
        echo '<div class = "result_cell">';

            echo '<div class = "result_img"><img src="' . $this->result->image_url . '"></div>';
            echo '<div clsss = "result_desc">' . $this->result->description . '</div>';
            echo '<div clsss = "result_price">' . $this->result->price . '</div>';

        echo '</div>';

        echo "<br><br>";
    }


} 