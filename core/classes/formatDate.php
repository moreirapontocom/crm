<?
/*
 * $formata = new formatDate();
 * $formata->datetime( date("Y-m-d") );
 * $formata->datetime( date("Y-m-d H:i:s") );
 * $formata->format(1);
 * $formata->go();
*/
class formatDate {

	private $datetime;
	private $hour;
	private $format;
	
	public function datetime($datetime) {
		$this->datetime = $datetime;
	}

	public function format($format) {
		$this->format = $format;
	}

	public function go() {
		$year = substr($this->datetime,0,4);
		$mounth = substr($this->datetime,5,2);
		$day = substr($this->datetime,8,2);
		
		$hour = explode(" ",$this->datetime);
		
		if ( isset($hour[1]) ) {
			$this->hour = $hour[1];
			
			$hour = substr($this->datetime,11,2);
			$minut = substr($this->datetime,14,2);
			$second = substr($this->datetime,17,2);
			$this->hour = " ".$hour.":".$minut.":".$second;
			
		} else
			$this->hour = '';

		
		switch ($mounth) {
			case "01": $swmounth = "Janeiro"; break;
			case "02": $swmounth = "Fevereiro"; break;
			case "03": $swmounth = "Mar&ccedil;o"; break;
			case "04": $swmounth = "Abril"; break;
			case "05": $swmounth = "Maio"; break;
			case "06": $swmounth = "Junho"; break;
			case "07": $swmounth = "Julho"; break;
			case "08": $swmounth = "Agosto"; break;
			case "09": $swmounth = "Setembro"; break;
			case "10": $swmounth = "Outubro"; break;
			case "11": $swmounth = "Novembro"; break;
			case "12": $swmounth = "Dezembro"; break;
		}

		if ($this->format == 1) {
			$result = $day."/".$mounth."/".$year.$this->hour;
		} else {
			$result = $day." de ".$swmounth." de ".$year.$this->hour;
		}
		
		return $result;
	}
}
?>