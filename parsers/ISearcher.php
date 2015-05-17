<?php

interface ISearcher
{
    public function setSearchParams(
        $type,
        $sub_type,
        $platform,
        $search_string
    );


    public function execute();


    public function getResults();


}
