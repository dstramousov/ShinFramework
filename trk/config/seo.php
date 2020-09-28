<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| This file containg all for SHIN_SEO library variables by default for each application.
| Each application can override this file.
| -------------------------------------------------------------------
*/

/*
| -------------------------------------------------------------------
| General charset for generated page. http://www.w3.org/TR/REC-html40/charset.html
| -------------------------------------------------------------------
*/
$seo['site_charset'] = 'UTF-8';

/*
| -------------------------------------------------------------------
| Meta elements are HTML or XHTML elements used to provide structured metadata about a Web page. 
| Such elements must be placed as tags in the head section of an HTML or XHTML document. 
| Meta elements can be used to specify page description, keywords and any other metadata not 
| provided through the other head elements and attributes.
| -------------------------------------------------------------------
*/
$seo['description'] = '';

/*
| -------------------------------------------------------------------
| Max legth of description.
| -------------------------------------------------------------------
*/
$seo['max_description'] = 200;

/*
| -------------------------------------------------------------------
| Max count of keywords.
| -------------------------------------------------------------------
*/
$seo['max_keywords'] = 15;

/*
| -------------------------------------------------------------------
| Min legth for passing in to keywords.
| -------------------------------------------------------------------
*/
$seo['min_keywords_len'] = 4;

/*
| -------------------------------------------------------------------
| Meta template name.
| -------------------------------------------------------------------
*/
$seo['meta_template_name'] = 'meta.tpl';

/*
| -------------------------------------------------------------------
| Separator for browser title. Example:     This is the site :: Products :: Lift model 4567/7632
| -------------------------------------------------------------------
*/
$seo['title_separator'] = ' :: ';

/*
| -------------------------------------------------------------------
|  
| -------------------------------------------------------------------
*/
$seo['expires'] = 'Sat, 26 Jul 1997 05:00:00 GMT';

/*
| -------------------------------------------------------------------
|  
| -------------------------------------------------------------------
*/
$seo['cache-control'] = 'no-cache';

/*
| -------------------------------------------------------------------
|  
| -------------------------------------------------------------------
*/
$seo['keywords'] = '';

/*
| -------------------------------------------------------------------
|  
| -------------------------------------------------------------------
*/
$seo['robots'] = 'all-index';

/*
| -------------------------------------------------------------------
|  
| -------------------------------------------------------------------
*/
$seo['revisit-after'] = '1 days';

/*
| -------------------------------------------------------------------
|  
| -------------------------------------------------------------------
*/
$seo['distribution'] = 'global';

/*
| -------------------------------------------------------------------
|  
| -------------------------------------------------------------------
*/
$seo['rating'] = 'general';

/*
| -------------------------------------------------------------------
|  
| -------------------------------------------------------------------
*/
$seo['content-language'] = 'English';

/*
| -------------------------------------------------------------------
|  
| -------------------------------------------------------------------
*/
$seo['author'] = 'ShinSoftware';

/*
| -------------------------------------------------------------------
|  
| -------------------------------------------------------------------
*/
$seo['copyright'] = 'ShinSoftware Company';


/*
| -------------------------------------------------------------------
|  
| -------------------------------------------------------------------
*/
$seo['banned_words'] = array("able", "about", "above", "act", "add", "afraid", "after", "again", "against", "age", "ago", "agree", "all", "almost", "alone", "along", "already", "also", "although", "always", "am", "amount", "an", "and", "anger", "angry", "animal", "another", "answer", "any", "appear", "apple", "are", "arrive", "arm", "arms", "around", "arrive", "as", "ask", "at", "attempt", "aunt", "away", "back", "bad", "bag", "bay", "be", "became", "because", "become", "been", "before", "began", "begin", "behind", "being", "bell", "belong", "below", "beside", "best", "better", "between", "beyond", "big", "body", "bone", "born", "borrow", "both", "bottom", "box", "boy", "break", "bring", "brought", "bug", "built", "busy", "but", "buy", "by", "call", "came", "can", "cause", "choose", "close", "close", "consider", "come", "consider", "considerable", "contain", "continue", "could", "cry", "cut", "dare", "dark", "deal", "dear", "decide", "deep", "did", "die", "do", "does", "dog", "done", "doubt", "down", "during", "each", "ear", "early", "eat", "effort", "either", "else", "end", "enjoy", "enough", "enter", "even", "ever", "every", "except", "expect", "explain", "fail", "fall", "far", "fat", "favor", "fear", "feel", "feet", "fell", "felt", "few", "fill", "find", "fit", "fly", "follow", "for", "forever", "forget", "from", "front", "gave", "get", "gives", "goes", "gone", "good", "got", "gray", "great", "green", "grew", "grow", "guess", "had", "half", "hang", "happen", "has", "hat", "have", "he", "hear", "heard", "held", "hello", "help", "her", "here", "hers", "high", "hill", "him", "his", "hit", "hold", "hot", "how", "however", "I", "if", "ill", "in", "indeed", "instead", "into", "iron", "is", "it", "its", "just", "keep", "kept", "knew", "know", "known", "late", "least", "led", "left", "lend", "less", "let", "like", "likely", "likr", "lone", "long", "look", "lot", "make", "many", "may", "me", "mean", "met", "might", "mile", "mine", "moon", "more", "most", "move", "much", "must", "my", "near", "nearly", "necessary", "neither", "never", "next", "no", "none", "nor", "not", "note", "nothing", "now", "number", "of", "off", "often", "oh", "on", "once", "only", "or", "other", "ought", "our", "out", "please", "prepare", "probable", "pull", "pure", "push", "put", "raise", "ran", "rather", "reach", "realize", "reply", "require", "rest", "run", "said", "same", "sat", "saw", "say", "see", "seem", "seen", "self", "sell", "sent", "separate", "set", "shall", "she", "should", "side", "sign", "since", "so", "sold", "some", "soon", "sorry", "stay", "step", "stick", "still", "stood", "such", "sudden", "suppose", "take", "taken", "talk", "tall", "tell", "ten", "than", "thank", "that", "the", "their", "them", "then", "there", "therefore", "these", "they", "this", "those", "though", "through", "till", "to", "today", "told", "tomorrow", "too", "took", "tore", "tought", "toward", "tried", "tries", "trust", "try", "turn", "two", "under", "until", "up", "upon", "us", "use", "usual", "various", "verb", "very", "visit", "want", "was", "we", "well", "went", "were", "what", "when", "where", "whether", "which", "while", "white", "who", "whom", "whose", "why", "will", "with", "within", "without", "would", "yes", "yet", "you", "young", "your", "br", "img", "p","lt", "gt", "quot", "copy");

/* End of file seo.php */
/* Location: ./shinfw/config/seo.php */