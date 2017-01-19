<?php


namespace Wordranker\Rankers;


class Tokenizer
{

    /** @var string */
    protected $text;

    /** @var string */
    protected $delimiter;

    /**
     * Tokenizer constructor.
     *
     * @param $text string
     * @param $delimiter string
     */
    public function __construct($text, $delimiter = ' ')
    {
        $this->text = $text;
        $this->delimiter = $delimiter;
    }

    /**
     * Tokenize the provided text.
     *
     * @return array
     */
    public function tokenize()
    {
        return explode($this->delimiter, $this->text);
    }
}
