<?php

require_once('./parsers/ISearcher.php');

class BaseSearcher
{


    protected $dom;
    protected $query;
    protected $results;


    public function BaseSearcher()
    {
        libxml_use_internal_errors(true);

        $this->dom = new DOMDocument('1.0', 'UTF-8');
        $this->dom->substituteEntities = TRUE;

        $this->results = array();

    }


    public function printResults()
    {
        for ($resIdx=0; $resIdx<count($this->results); $resIdx++)
        {
            echo $this->results[$resIdx]->image_url->C14N(TRUE);
            echo $this->results[$resIdx]->description;
            echo $this->results[$resIdx]->price;

            echo "<br><br>";
        }
    }


    public function getResults()
    {
        return $this->results;
    }


} 