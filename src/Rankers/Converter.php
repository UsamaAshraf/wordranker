<?php


namespace Wordranker\Rankers;


interface Converter
{

    /**
     * @param $words array
     * @return array
     */
    public function convert($words);
}
