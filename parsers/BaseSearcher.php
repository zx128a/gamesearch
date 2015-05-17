<?php


class BaseSearcher
{
    protected $dom;


    public function BaseSearcher()
    {
        libxml_use_internal_errors(true);

        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->substituteEntities = TRUE;
    }


} 