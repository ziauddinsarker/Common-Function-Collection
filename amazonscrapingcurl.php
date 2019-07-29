<?php
	
$curl = curl_init();

$search_string = "php";
$url = "https://mixess.jp/s/w".$search_string."/";
//echo $url;

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//https://mixess.jp/s/w
//https://mixess.jp/detail/224

$result = curl_exec($curl);
preg_match("!https://mixess.jp/detail/(\d+)/!", $result, $matches);
	print_r($matches);
curl_close($curl);
?>

<?php
/*
$str = 'foobar: 2008';

preg_match('/(\d+)/', $str, $matches);

/* This also works in PHP 5.2.2 (PCRE 7.0) and later, however 
 * the above form is recommended for backwards compatibility */
// preg_match('/(?<name>\w+): (?<digit>\d+)/', $str, $matches);

//print_r($matches);

?>