<?
function CARandWord() {
	global $word;
	
	$arrayVowels = array('a','e','i','o','u');
	$arrayConsonants = array('b','c','d','f','g','h','nh','lh','ch','j','k','l','m','n','p','qu','r','rr','s','ss','t','v','w','x','y','z',);
	
	$word = '';
	$word_size = rand(2,5);
	$syllable_count = 0;
	while($syllable_count < $word_size){
	   
	   $vowel = $arrayVowels[rand(0,count($arrayVowels)-1)];
	   $consonant = $arrayConsonants[rand(0,count($arrayConsonants)-1)];
	   $syllable = $consonant.$vowel;
	   $word .= $syllable;
	   $syllable_count++;
	   
	   unset($vowel,$consonant,$silaba);
	}

	return $word;
	
	unset($arrayVowels,$arrayConsonants,$word,$word_size,$syllable_count);
}
?>