<?php
echo "<!-- functions loaded! -->";

function get_min($array){
  $min=array('second_name' => "Default value",'total_points' => 20000);
  foreach ($array as $arr){
    #echo "Testing " . $arr['second_name'] . " with score " . $arr['total_points'];
    if ($arr['total_points'] < $min['total_points']){
      $min = $arr;
    }//end if
    #echo "Min is now " . $min['second_name'] . " with score " . $min['total_points'];
  } //end foreach
  return $min;
} //end get_min()
  

function auto_sort($team){
  
  echo "<h3>". $team['name'] ."</h3>";
  echo $team['manager'];
  $bench = array();
  $pitch = array();
  $gk = array();
  $df = array();
  $md = array();
  $fw = array();
  for($i = 1; $i<=15; $i++)
  {
    $url = "http://fantasy.premierleague.com/web/api/elements/" . $team[$i] . "/";
    $content = file_get_contents($url);
    $json = json_decode($content, true);
    //Player
    switch($json['type_name']){
      case "Goalkeeper":
        $gk[] = $json;
        break;

  default:
        $outfield[] = $json;
} //end switch
}//end for

//bench lower scoring goalie
$bench_gk = get_min($gk);
$bench[] = $bench_gk;
//remove bench goalie from gk array
$key = array_search($bench_gk, $gk);
unset($gk[$key]);

//bench three outfield players
for($i=1;$i<=3;$i++){
$sub = get_min($outfield);
$bench[] = $sub;  
$key = array_search($sub, $outfield);
unset($outfield[$key]);
}//end for

//add goalie to 'pitch' team
foreach ($gk as $g){
  $pitch[] = $g;
} //end foreach

//add all non-benched outfielders to pitch team
foreach ($outfield as $out){
  $pitch[] = $out;
}

//set table layout
echo "<table><tr><td>First team</td><td>Subs</td></tr><tr><td style='text-align: center;' valign=top>";
//here we go - try to output pitch team
$team_total = 0;

/* EDIT sort by player type (5/4/2016)

echo $gk[0] . "<br />";

for ($i = 0; $i <= 9; $i++)
{
  if ($outfield[$i]['type_name'] != $outfield[$i - 1]['type_name']){
    echo "<br />";
  }
  echo $outfield[$i] . " ";
}

/END edit */

foreach ($pitch as $pit){
  $team_total += $pit['total_points'];
echo "<p>" . $pit['first_name'] . " " . $pit['second_name']. ", " .$pit['type_name'] . " (" . $pit['team_name'] . ") " . $pit['total_points'] . "points</p>";
}


echo "</td><td valign=top>";

//here we go - try to output bench team
$bench_total = 0;
foreach ($bench as $ben){
  $bench_total += $ben['total_points'];
echo "<p>" . $ben['first_name'] . " " . $ben['second_name']. ", " . $ben['team_name'] . " " . $ben['total_points'] . "points</p>";
}


  echo "</td></tr><tr><td>";
echo "<p><b>On pitch: $team_total points</p></b></td><td>";
$squad_total = $team_total + $bench_total;
echo "<p>On bench: $bench_total points</p>";

  echo "<p>Combined first team &amp; subs: $squad_total points</p>";
  echo "</td></tr></table>";
} //end autosort



?>
