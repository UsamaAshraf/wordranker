<?php


namespace Wordranker\Rankers;


class Tokenizer
{

    /** @var string */
    protected $text;

    /** @var string */
    protected $delimiter;

    /** @var string */
    protected $regex;


    /**
     * Tokenizer constructor.
     *
     * @param $text string
     * @param $delimiter string
     * @param null $regex
     */
    public function __construct($text, $delimiter = ' ', $regex = null)
    {
        $this->text = $text;
        $this->delimiter = $delimiter;
        $this->regex = $regex;
    }

    /**
     * Tokenize the provided text.
     *
     * @return array
     */
    public function tokenize()
    {
        if (empty($this->regex))
            return explode($this->delimiter, $this->text);

        $matches = [];
        $result = [];

        preg_match_all($this->regex, $this->text, $matches);

        array_walk_recursive($matches, function($a) use (&$result) { $result[] = $a; });

        return $result;
    }
}
