<?
function converteAlias($texto) {
	global $out;
	
	$out = $texto;
	
	$out = mb_strtolower($out);
	$out = utf8_encode($out);

	$out = str_replace('á','a',$out);
	$out = str_replace('à','a',$out);
	$out = str_replace('ã','a',$out);
	$out = str_replace('â','a',$out);
	
	$out = str_replace('é','e',$out);
	$out = str_replace('è','e',$out);
	$out = str_replace('ê','e',$out);
	
	$out = str_replace('í','i',$out);
	$out = str_replace('ì','i',$out);

	$out = str_replace('ó','o',$out);
	$out = str_replace('ò','o',$out);
	$out = str_replace('õ','o',$out);
	$out = str_replace('ô','o',$out);
	
	$out = str_replace('ú','u',$out);
	$out = str_replace('ç','c',$out);

	$out = str_replace(',','',$out);
	$out = str_replace('.','',$out);
	$out = str_replace('!','',$out);
	$out = str_replace('@','',$out);
	$out = str_replace('#','',$out);
	$out = str_replace('$','',$out);
	$out = str_replace('%','',$out);
	$out = str_replace('¨','',$out);
	$out = str_replace('&','',$out);
	$out = str_replace('*','',$out);
	$out = str_replace('(','',$out);
	$out = str_replace(')','',$out);
	$out = str_replace('-','',$out);
	$out = str_replace('[','',$out);
	$out = str_replace(']','',$out);
	$out = str_replace('{','',$out);
	$out = str_replace('}','',$out);
	$out = str_replace('/','',$out);
	$out = str_replace('<','',$out);
	$out = str_replace('>','',$out);
	$out = str_replace(':','',$out);
	$out = str_replace('?','',$out);
	$out = str_replace('+','',$out);
	$out = str_replace('|','',$out);
	$out = str_replace('~','',$out);
	$out = str_replace('^','',$out);
	$out = str_replace(';','',$out);
	$out = str_replace(' ','-',$out);

	// e se tudo falhar, ainda tem essa
	$out = urlencode($out);
	
	$out = utf8_decode($out);
	
	return $out;
}
?>