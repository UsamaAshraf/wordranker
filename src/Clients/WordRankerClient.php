<?php


namespace Wordranker\Clients;


use Wordranker\Rankers\Ranker;
use Wordranker\Rankers\Tokenizer;

/**
 * This class is responsible for exposing the package to the client.
 */
class WordRankerClient
{

    /** @var string */
    protected $content;

    /** @var Tokenizer */
    protected $tokenizer;

    /** @var float */
    protected $baseRank;

    /** @var Ranker */
    protected $ranker;

    /**
     * Wordranker constructor.
     *
     * @param $content string
     * @param $blacklist array
     * @param $regex
     * @param $baseRank float
     */
    public function __construct($content, $blacklist, $regex, $baseRank = 0.0)
    {
        $this->content = $content;

        $this->baseRank = $baseRank;

        $this->tokenizer = new Tokenizer($content, null, $regex);

        $this->ranker = new Ranker($blacklist, $regex);
    }

    /**
     * Return the keywords with their ranks.
     */
    public function rank()
    {
        try {

            $words = $this->tokenizer->tokenize();

            $rankedWords = $this->initializeRanks($words);

            $finalRankedWords = $this->ranker->run($rankedWords);

            return $finalRankedWords;
        }
        catch (\Exception $exception) {

            die($exception->getTraceAsString());
        }
    }

    /**
     * Initialize the provided words with the base rank.
     *
     * @param $words array
     * @return array
     */
    protected function initializeRanks($words)
    {
        $result = [];
        $baseRank = $this->baseRank;

        foreach ($words as $word) {
            if (isset($result[$word])) {
                $result[$word] = $baseRank;
            }
            $result[$word] = $result[$word] + 1;
        }

        return $result;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}
