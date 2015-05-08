<?php
error_reporting(-1);
/*init_set('display_errors', 1);*/

function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_COOKIEFILE, 'crime_cookies.txt');
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

$httpUrl = get_data('http://www.mylocalcrime.com/#39.955199%2C%20-86.11117');
//file_put_contents('crime_data.html', $httpUrl);



$crime_doc = new DOMDocument(); 
echo $crime_doc;
$crime_doc->loadHTMLFile($httpUrl);

file_put_contents('crime_data.html', $crime_doc);

$crime_xpath = new DOMXPath($crime_doc);
var_dump($crime_xpath);


$crime_row = $crime_xpath->query('/tr');


	foreach ($crime_row as $row)
	{
		echo $row->nodeValue."<br/>";
	}
?>