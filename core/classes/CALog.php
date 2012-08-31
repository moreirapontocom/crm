<?
function CASaveLog($string) {
	$file = fopen($_SERVER['DOCUMENT_ROOT']."/manager/log/log.txt", "a");
	fwrite($file, date("Y-m-d H:i:s").' '.$string.'| ');
	fclose($file);
}
?>