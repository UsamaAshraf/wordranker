<?php


namespace Wordranker\Rankers;


class Ranker
{

    /** @var Converter[] */
    protected $converters;

    /**
     * Ranker constructor.
     *
     * @param $blacklist array
     * @param $regex
     */
    public function __construct($blacklist, $regex)
    {
        $this->converters = [
            new Blacklist($blacklist),
            new Matcher($regex)
        ];
    }

    /**
     * @param $words array
     * @return array
     */
    public function run($words)
    {
        $converters = $this->converters;

        foreach ($converters as $converter)
            $words = $converter->convert($words);

        return $words;
    }
}
