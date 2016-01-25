<?php

echo "Working!";

$dan = array(
0=>"My team",
1	=>	3,
2	=>	"323",	
3	=>	449,
4	=>	131,
5	=>	471,
6	=>	301,
7	=>	398,
8	=>	197,
9	=>	217,
10	=>	67,
11	=>	87,
12	=>	112,
13	=>	371,
14	=>	171,
15	=>	250	

);

$url = "http://fantasy.premierleague.com/web/api/elements/" . $dan[2] . "/";
$content = file_get_contents($url);
$json = json_decode($content, true);


echo "Content: " .$content;

echo "URL: " . $url;

echo "json: " . $json;
echo "<p />";
echo $json['total_score'];

echo $json['total_score'];

?>
