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
        echo '<img src="' . $this->result->image_url . '" class = "result_image"></img>';
        echo $this->result->description;
        echo $this->result->price;

        echo "<br><br>";
    }


} 