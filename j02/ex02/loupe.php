#!/usr/bin/php
<?PHP
if (!isset($argv[1]))
	exit(0);
$text = file_get_contents($argv[1]);
$text = preg_replace_callback("/(.*?)title=\"(.*?)\"(.*?)/", function ($m) {return $m[1]."title=\"".strtoupper($m[2])."\"".$m[3];}, $text);
$text = preg_replace_callback("/<a(.*?)>(.*?)<(.*?)/", function ($m) {return "<a".$m[1].">".strtoupper($m[2])."<".$m[3];}, $text);
echo $text;
?>
