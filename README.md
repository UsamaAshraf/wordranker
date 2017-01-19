**PHP Word Ranker**


`composer require usama-ashraf/wordranker`


```
use Wordranker\Clients\WordRankerClient;


$text = 'a quick brown fox jump over the';

$blacklist = ['a' , 'over', 'the'];

$ranker = new WordRankerClient($text, $blacklist, '/[a-z]/');

$words = $ranker->rank();

/**
  [
    'quick' => 0.0,
    'brown' => 0.0,
    'fox'   => 0.0,
    'jump'  => 0.0
  ] 
**/
```
