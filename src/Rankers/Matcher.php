<?php


namespace Wordranker\Rankers;


class Matcher
{

    protected $regex;

    /**
     * Matcher constructor.
     *
     * @param $regex
     */
    public function __construct($regex)
    {
        $this->regex = $regex;
    }

    /**
     * Convert the ranked words array.
     *
     * @param $words array
     * @return array
     */
    public function convert($words)
    {
        $regex = $this->regex;

        $result = [];

        foreach ($words as $word => $rank)
            if (preg_match($regex, $word) === 1)
                $result[$word] = $rank;

        return $result;
    }
}
