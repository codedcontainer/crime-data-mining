<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/* Get the following webpage and extract the data to be
sent to mongo db for storage */

/* Get data through Curl */

libxml_disable_entity_loader(false);
function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_COOKIEFILE, 'mylocalcrime.txt');
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
$returned_data = get_data('http://www.mylocalcrime.com/#39.955199%2C%20-86.11117');
$dom = new DOMDocument();
$dom->loadHTMLFile($returned_data);
$dom->saveHTMLFile('test.html');
echo $dom;
/*

$httpUrl = file_get_contents('http://www.mylocalcrime.com/#39.955199%2C%20-86.11117');
echo $httpUrl;



$crime_doc = new DOMDocument(); 
libxml_use_internal_errors(TRUE);
$crime_doc->loadHTML($httpUrl);
$crime_xpath = new DOMXPath($crime_doc);
var_dump($crime_xpath);


$crime_row = $crime_xpath->query('/tr');


	foreach ($crime_row as $row)
	{
		echo $row->nodeValue."<br/>";
	}*/
?>