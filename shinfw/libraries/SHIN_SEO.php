<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource  shinfw/libraries/SHIN_SEO.php
 */
 
/*
Tips to create Good Meta Description Tags:

* Keep the content length below 160 characters.
* Use relevant keywords but keep the sentences meaningful.
* Do not insert unnecessary keywords. Keyword spamming can get your website penalized.
* Create Unique meta descriptions on each page of your site.
* Think what people would search for and then decide the description.
* Avoid crossing the 160 characters content limit.
* Your Most Targeted keywords must be present at the start of the Description content. Keywords with lesser priority must be placed later in the description.
* Use keyword combinations rather than pure repetition.
*/ 

/*  Example of usage 

// Reading content form file or url
$seo->setText(file_get_contents("http://www.shinsoftware.it/"));

// Prints the text
echo $seo->getText();

// Description 150 chars
$seo->setDescriptionLen(150);

// Print description
echo $seo->getMetaDescription();

// Banned words, override the existing ones for keywords
$seo->setBannedWords("sed,non,libero");

// Sets 10 the max keywords
$seo->setMaxKeywords(10);

// All the words with len less than 5 will be erased
$seo->setMinWordLen(5);

// Rreturns the keys
echo $seo->getKeyWords();
*/

/**
 * Library for realisation all items for SEO:
 * 1. Generate <META>:
 * site_charset, description, expires, pragma, cache-control, keywords, robots, revisit-after, distribution, rating, 
 * content-language, author, copyright.
 *
 * Search engine optimization (SEO) is the process of improving the visibility of a web site or a web 
 * page in search engines via the "natural" or un-paid ("organic" or "algorithmic") search results. 
 * Other forms of search engine marketing  (SEM) target paid listings. In general, the earlier 
 * (or higher on the page), and more frequently a site appears in the search results list, 
 * the more visitors it will receive from the search engine. SEO may target different kinds 
 * of search, including image search, local search, video search and industry-specific vertical search engines.
 *
 * @package		ShinPHP framework
 * @subpackage	Library
 * @author		
 * @link		shinfw/libraries/SHIN_SEO.php
 */

class SHIN_SEO extends SHIN_Libs
{
	protected $_globals = array();
		
    /**
     * Text to work with 
     */
	private $text;
	
    /**
     * Max len for the meta description
     */
	private $maxDescriptionLen=220;
	
    /**
     * Mix number of keywords to return
     */
	private $maxKeywords=25;
	
    /**
     * Min len for a word
     */
	private $minWordLen=3;
	
    /**
     * Banned words in english feel free to change them
     */
	private $bannedWords=array("able", "about", "above", "act", "add", "afraid", "after", "again", "against", "age", "ago", "agree", "all", "almost", "alone", "along", "already", "also", "although", "always", "am", "amount", "an", "and", "anger", "angry", "animal", "another", "answer", "any", "appear", "apple", "are", "arrive", "arm", "arms", "around", "arrive", "as", "ask", "at", "attempt", "aunt", "away", "back", "bad", "bag", "bay", "be", "became", "because", "become", "been", "before", "began", "begin", "behind", "being", "bell", "belong", "below", "beside", "best", "better", "between", "beyond", "big", "body", "bone", "born", "borrow", "both", "bottom", "box", "boy", "break", "bring", "brought", "bug", "built", "busy", "but", "buy", "by", "call", "came", "can", "cause", "choose", "close", "close", "consider", "come", "consider", "considerable", "contain", "continue", "could", "cry", "cut", "dare", "dark", "deal", "dear", "decide", "deep", "did", "die", "do", "does", "dog", "done", "doubt", "down", "during", "each", "ear", "early", "eat", "effort", "either", "else", "end", "enjoy", "enough", "enter", "even", "ever", "every", "except", "expect", "explain", "fail", "fall", "far", "fat", "favor", "fear", "feel", "feet", "fell", "felt", "few", "fill", "find", "fit", "fly", "follow", "for", "forever", "forget", "from", "front", "gave", "get", "gives", "goes", "gone", "good", "got", "gray", "great", "green", "grew", "grow", "guess", "had", "half", "hang", "happen", "has", "hat", "have", "he", "hear", "heard", "held", "hello", "help", "her", "here", "hers", "high", "hill", "him", "his", "hit", "hold", "hot", "how", "however", "I", "if", "ill", "in", "indeed", "instead", "into", "iron", "is", "it", "its", "just", "keep", "kept", "knew", "know", "known", "late", "least", "led", "left", "lend", "less", "let", "like", "likely", "likr", "lone", "long", "look", "lot", "make", "many", "may", "me", "mean", "met", "might", "mile", "mine", "moon", "more", "most", "move", "much", "must", "my", "near", "nearly", "necessary", "neither", "never", "next", "no", "none", "nor", "not", "note", "nothing", "now", "number", "of", "off", "often", "oh", "on", "once", "only", "or", "other", "ought", "our", "out", "please", "prepare", "probable", "pull", "pure", "push", "put", "raise", "ran", "rather", "reach", "realize", "reply", "require", "rest", "run", "said", "same", "sat", "saw", "say", "see", "seem", "seen", "self", "sell", "sent", "separate", "set", "shall", "she", "should", "side", "sign", "since", "so", "sold", "some", "soon", "sorry", "stay", "step", "stick", "still", "stood", "such", "sudden", "suppose", "take", "taken", "talk", "tall", "tell", "ten", "than", "thank", "that", "the", "their", "them", "then", "there", "therefore", "these", "they", "this", "those", "though", "through", "till", "to", "today", "told", "tomorrow", "too", "took", "tore", "tought", "toward", "tried", "tries", "trust", "try", "turn", "two", "under", "until", "up", "upon", "us", "use", "usual", "various", "verb", "very", "visit", "want", "was", "we", "well", "went", "were", "what", "when", "where", "whether", "which", "while", "white", "who", "whom", "whose", "why", "will", "with", "within", "without", "would", "yes", "yet", "you", "young", "your", "br", "img", "p","lt", "gt", "quot", "copy");
		
    /**
     * Array for keeping all TITLE informagtion.
     */
    var $title_array = array();
	
	    
	/**
	 * Init SEO module.
	 *
	 * @param string $_text Some text for analyzing and prepare good keywords.
	 * @param string $_mode TODO
	 * @return void
	 */     
     function __construct($_text=NULL, $_mode=NULL)
     {	 	 
        parent::__construct('seo', NULL); 
		
		Console::logSpeed('SHIN_SEO begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		if($_text){
			$this->setText($_text);
		}
		
		Console::logMemory($this, 'SHIN_SEO. Size of class: ');
     }
	 	
	/**
	* Prepare and inject meta variables.
	*
	* @access	private	
	* @return	NULL
	*/
	function render($_htmlID = null)
	{
		$this->_injectMeta();
		$this->_injectTitle();
	} 
	
	/**
	* Prepare and inject meta variables
	*
	* @access	private	
	* @return	NULL
	*/
	protected function _injectMeta()
	{		
		//dump($this->sh_Options);
		SHIN_Core::$_libs['templater']->assignByRef($this->sh_Options);
		
		SHIN_Core::$_libs['templater']->assign('meta', SHIN_Core::$_libs['templater']->setBlock($this->sh_Options['meta_template_name']));
	} 
	
	/**
	* Prepare and inject HTML-title variable
	*
	* @access	private	
	* @return	NULL
	*/
	protected function _injectTitle()
	{
		$ready_title = implode($this->sh_Options['title_separator'], $this->title_array);
		SHIN_Core::$_libs['templater']->assign('title', $ready_title);
	} 
	 	
	/**
	 * Add string for browser title. 
	 *
	 * @param string $cache_id cache id 
	 * @return void or parsed templater content
	 */
	public function addToTitle($param)
	{
		array_push($this->title_array, $param);
	}
	
	/**
	 * SEO for meta description, returns a text with meta description.
	 *
	 * @param string $cache_id cache id 
	 * @return void or parsed templater content
	 */
	function getMetaDescription($len=null)
	{		
		$this->setDescriptionLen($len);//by param set len
		return substr($this->getText(), 0, $this->getDescriptionLen());
	}
	
	/**
	 * Get Keywords from the given text.
	 *
	 * @param string $cache_id cache id 
	 * @return void or parsed templater content
	 */
	function getKeyWords($mKw=null)
	{
		$this->setMaxKeywords($mKw);// by param max keywords
		$text = $this->getText();
		
		// Replace not valid character
		$text = str_replace (array('–','(',')','+',':','.','?','!','_','*','-'), '', $text);
		// Replace for comas
		$text = str_replace (array(' ','.'), ',', $text);
		
		// Erase minor words, banned words and count
		$wordCounter=array();
		
		$arrText=explode(",",$text);
		unset($text);
		
		foreach ($arrText as $value)
		{
			$value=trim($value);
			
			if ( strlen($value)>=$this->getMinWordLen() && !in_array($value,$this->getBannedWords()) )
			{
				// No smaller than X and not in banned
				// I can count how many time we ad and update the record in an array
				if (array_key_exists($value,$wordCounter)){
					$wordCounter[$value]=$wordCounter[$value]+1;
				} else {
					$wordCounter[$value]=1;
				}
			}
		}
		unset($arrText);
	
		// Short from bigger to smaller
		uasort($wordCounter,array($this,cmp));
		
		$i=1;
		foreach($wordCounter as $key=>$value){
			$keywords.=$key.", ";
			if ($i<$this->getMaxKeywords()) $i++;
			else break;
		}
		unset($wordCounter);
		
		$keywords=substr($keywords,0,-2);
	
		return $keywords;
	}

	/**
	 * Set internal variable for text analyzing.
	 *
	 * @param string $text This is text for analyze.
	 * @return void
	 */
	function setText($_text)
	{
		$text = strip_tags($_text);
		$text = str_replace (array('\r\n', '\n', '+'), ',', $_text);
		$text = strtolower($_text);
		$this->text=$_text;
	}
	
	/**
	 * Return text.
	 *
	 * @param void
	 * @return string 
	 */
	function getText()
	{
		return $this->text;
	}
	
	/**
	 * Set length for "description" META tag.
	 *
	 * @param int $len 
	 * @return void 
	 */
	function setDescriptionLen($len)
	{
		if (is_numeric($len)) $this->maxDescriptionLen=$len;
	}
	
	/**
	 * Return max length description
	 *
	 * @param void
	 * @return int 
	 */
	function getDescriptionLen()
	{
		return $this->maxDescriptionLen;
	}
	
	/**
	 * Set max keyword for "keywords" <META>
	 *
	 * @param int $len Count of maximum words.
	 * @return void 
	 */
	function setMaxKeywords($len)
	{
		if (is_numeric($len)) $this->maxKeywords=$len;
	}
	
	/**
	 * Return length for max keyword.
	 *
	 * @param void
	 * @return ineger $len Count of words.
	 */
	function getMaxKeywords()
	{
		return $this->maxKeywords;
	}
	
	/**
	 * Set min count keyword for "keywords" <META>
	 *
	 * @param int $len Count of minimum words.
	 * @return void
	 */
	function setMinWordLen($len)
	{
		if (is_numeric($len)) $this->minWordLen=$len;
	}
	
	/**
	 * Get minimal word length.
	 *
	 * @param void
	 * @return int
	 */
	function getMinWordLen()
	{
		return $this->minWordLen;
	}
	
	/**
	 * Define and set banned words.
	 *
	 * @param string $words with words for banned.
	 * @return void
	 */
	function setBannedWords($words)
	{
		if (isset($words)){
			$arrText=explode(",",$words);
			if (is_array($arrText)) $this->bannedWords=$arrText;
		}
	}
	
	/**
	 * Get banned words.
	 *
	 * @param void
	 * @return array
	 */
	function getBannedWords()
	{
		return $this->bannedWords;
	}	
	
	/**
	 * Calculate how counting in to array.
	 *
	 * @param array $search
	 * @param array $array
	 * @return void or parsed templater content
	 */
	private function countWordArray($search,$array)
	{
		if (is_array($array) && $search!=""){
			$count=0;
			foreach ($array as $e) if ($e==$search) $count++;
			return $count;
		}
		else return false;
	}
	
	/**
	 * Sort for uasort descendent numbers
	 *
	 * @param string $cache_id cache id 
	 * @return void or parsed templater content
	 */
	private function cmp($a, $b)
	{
	    if ($a == $b) return 0;
	    return ($a < $b) ? 1 : -1;
	}

} // End of class.


/* End of file SHIN_SEO.php */
/* Location: shifw/library/SHIN_SEO.php */