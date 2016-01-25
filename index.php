<?php

function add_up($team){
  echo "<p>";
  for($i = 1; $i<=15; $i++)
  {
    $url = "http://fantasy.premierleague.com/web/api/elements/" . $team[$i] . "/";
    $content = file_get_contents($url);
    $json = json_decode($content, true);
    //Player
  echo $json['first_name'] . " " . $json['second_name'];
  //Details
  echo " (" . $json['type_name'] . ", " . $json['team_name'] . ") ";
  //Total score
  echo $json['total_points']."<br />";
  $team['score'] += $json['total_points'] ."pts<br />";
  } //end for
  echo "</p><p><b>" . $team['score'] . " points</b></p>";
} //end function


$dan = array(
0=>"Johnny-come-lately Ziggy Stardust/Hans Gruber Memorial XV",
1	=>	3,
2	=>	323,	
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
15	=>	250,	
"score" => 0
);

add_up($dan);

?>
