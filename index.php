<?php
error_reporting(-1);
/*init_set('display_errors', 1);*/
/* Get the following webpage and extract the data to be
sent to mongo db for storage */
$httpUrl = 'http://www.mylocalcrime.com/#39.955199%2C%20-86.11117';
$crime_doc = new DOMDocument(); 
$crime_doc->loadHTML($httpUrl);
$crime_xpath = new DOMXPath($crime_doc);
var_dump($crime_xpath);


$crime_row = $crime_xpath->query('/tr');


	foreach ($crime_row as $row)
	{
		echo $row->nodeValue."<br/>";
	}
?>