<?
function saveLog($string) {
	$file = fopen("/tmp/log.txt", "a");
	fwrite($file, $string."\n\n");
	fclose($file);
}

function getMetaTitleAndMetaDescription($URL='') {
    if ( $URL <> '' ) {
        $www = $URL;
        $www = trim($www);
        $www = addslashes($www);
        $www = htmlspecialchars($www);

        $www = file_get_contents($www);
        
        // title
        preg_match('$(\<title\>)(.*)(\<\/title\>)$', $www, $title);
        if ( isset($title[2]) ) {
            $title = $title[2];
            $title = html_entity_decode($title);
        
            $encoding = mb_detect_encoding($title, 'UTF-8, ISO-8859-1', true);
            if ( $encoding == 'UTF-8' )
                $title = utf8_decode($title);
        
        } else
            $title = 'Pagina sem titulo';
        
        // page description
        preg_match('$(name\=\"description\")(.*)(\/>)$', $www, $metaDescription);
        
        if ( isset($metaDescription[2]) ) {
            $metaDescription = $metaDescription[2];
            $metaDescription = str_replace(' content="', '', $metaDescription);
            $metaDescription = str_replace('"', '', $metaDescription);
            $metaDescription = html_entity_decode($metaDescription);
            
            $encoding = mb_detect_encoding($metaDescription, 'UTF-8, ISO-8859-1', true);
            if ( $encoding == 'UTF-8' )
                $metaDescription = utf8_decode($metaDescription);
            
        } else
            $metaDescription = '';
    
        $result = array($title,$metaDescription);
        return $result;
    } else
        return false;
}

//public function formatDate($timestamp,$format) {}
function getMonthName($monthNo) {
	switch ($monthNo) {
		case "1": $swmonth = "Janeiro"; break;
		case "2": $swmonth = "Fevereiro"; break;
		case "3": $swmonth = "Mar&ccedil;o"; break;
		case "4": $swmonth = "Abril"; break;
		case "5": $swmonth = "Maio"; break;
		case "6": $swmonth = "Junho"; break;
		case "7": $swmonth = "Julho"; break;
		case "8": $swmonth = "Agosto"; break;
		case "9": $swmonth = "Setembro"; break;
		case "10": $swmonth = "Outubro"; break;
		case "11": $swmonth = "Novembro"; break;
		case "12": $swmonth = "Dezembro"; break;
	}
	return $swmonth;
}

function validateEmail($email) {
	if ( !empty($email) ) {
		$email = trim($email);
		$email = addslashes($email);
		$email = htmlspecialchars($email);
		$email = strtoupper(strtolower($email));

		if ( strlen($email) == 0 || strlen($email) < 6 ) {
			
			$userAccount = "^[a-zA-Z0-9\._-]+@";
			$domain = "[a-zA-Z0-9\._-]+.";
			$ext = "([a-zA-Z]{2,4})$";
		
			$pattern = $userAccount.$domain.$ext;
		
			if ( ereg($pattern, $email) )
				return true;
			else
				return false;
			
		} else return false;
	} else
		return false;
}

function lower($string) {
	$string	= strtr(strtolower($string),"������������������������������","������������������������������");
    return $string;
}

function upper($string) {
	$string = strtr(strtoupper($string),"������������������������������","������������������������������");
	return $string;
}

function generateHash($length='') {
	if ( $length == '' )
		$length = 3;

	$return = substr(md5(time()), 0, $length);
	return $return;
}
?>