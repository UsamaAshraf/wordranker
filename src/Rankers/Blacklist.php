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
        $blacklist = $this->blacklist;

        $keys = array_keys($words);

        foreach ($keys as $key)
            if (in_array($key, $blacklist))
                unset($words[$key]);

        return $words;
    }
}
