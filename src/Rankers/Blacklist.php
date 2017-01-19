<?php


namespace Wordranker\Rankers;


class Blacklist implements Converter
{

    /** @var array */
    protected $blacklist;

    /**
     * BlackList constructor.
     *
     * @param $blacklist array
     */
    public function __construct($blacklist)
    {
        $this->blacklist = $blacklist;
    }

    /**
     * Convert the ranked words array.
     *
     * @param $words array
     * @return array
     */
    public function convert($words)
    {
        return array_diff_key($words, $this->blacklist);
    }
}
