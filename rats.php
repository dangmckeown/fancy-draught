<?php

// New file - try to monitor if there's any correlation between Fantasy Teams and reality

//set and populate teams array

$teams = array();

for($i=1;$i<=659;$i++){

 $url = "http://fantasy.premierleague.com/web/api/elements/" . $i . "/";
    $content = file_get_contents($url);
    $json = json_decode($content, true);
	$key = $json['team_name'];
	$teams[$key][] = $json;
} //end for $i

foreach ($teams as $tm){
 foreach ($key as $k){
 echo $k[second_name];
 }
 echo $key;
}


/*

$prem_table = array(
'Leicester'=>	47,
'Man City'=>	44,
'Arsenal'=>	44,
'Spurs'=>	42,
'Man Utd'=>	37,
'West Ham'=>	36,
'Liverpool'=>	34,
'Southampton'=>	33,
'Stoke'=>	33,
'Watford'=>	32,
'Crystal Palace'=>	31,
'Everton'=>	29,
'Chelsea'=>	28,
'West Brom'=>	28,
'Swansea'=>	25,
'Bournemouth'=>	25,
'Norwich'=>	23,
'Newcastle'=>	21,
'Sunderland'=>	19,
'Aston Villa'=>	13
);

foreach($prem_table as $prem){
//get key and reference against fantasy score totals
$fantasy_total = 0;

foreach ($teams[key($prem)] as $tm){
$fantasy_total += $tm['total_points'];
}

echo key($prem) . " " . $fantasy_total / $prem . "<br />;

}
*/

?>
