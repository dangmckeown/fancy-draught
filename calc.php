<?php
//=========
//== RECREATE INDEX FILE, TRY TO AUTOSORT TEAMS
//=========

function get_min($array){
  $min=array('second_name' => "Default value",'total_points' => 20000);
  foreach ($array as $arr){
    echo "Testing " . $arr['second_name'] . " with score " . $arr['total_points'];
    if ($arr['total_points'] < $min['total_points']){
      $min = $arr;
    }//end if
    echo "Min is now " . $min['second_name'] . " with score " . $min['total_points'];
  } //end foreach
  return $min;
} //end get_min()
  

function add_up($team){
  echo "<h3>". $team['name'] ."</h3>";
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

function auto_sort($team){
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
      /*case "Defender":
        $df[] = $json;
        break;
      case "Midfielder":
        $md[] = $json;
        break;
      default:
        $fw[] = $json;*/
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
echo "<table><tr><td valign=top>";
//here we go - try to output pitch team
$team_total = 0;
foreach ($pitch as $pit){
  $team_total += $pit['total_points'];
echo "<p>" . $pit['second_name']. ", " .$pit['type_name'] . " " . $pit['total_points'] . "points</p>";
}

echo "<p>On pitch: $team_total points</p>";
echo "</td><td valign=top>";

//here we go - try to output bench team
$bench_total = 0;
foreach ($bench as $ben){
  $bench_total += $ben['total_points'];
echo "<p>" . $ben['second_name']. ", " .$ben['type_name'] . " " . $ben['total_points'] . "points</p>";
}
$squad_total = $team_total + $bench_total;
echo "<p>On bench: $bench_total points</p>";

  echo "<p>Combined first team &amp; subs: $squad_total points</p>";
  echo "</td></tr></table>";
} //end autosort

$dan = array(
"name"=>"Johnny-come-lately Ziggy Stardust/Hans Gruber Memorial XV",
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
$holly = array(
"name"=>"The Bengal Penguins",
1	=>	465	,
2	=>	259	,
3	=>	132	,
4	=>404	,
5	=>	16	,
6	=>	238	,
7	=>	338	,
8	=>	457	,
9	=>	222	,
10	=>	98	,
11	=>	321	,
12	=>	30	,
13	=>	185	,
14	=>	188	,
15	=>	376,
"score" => 0
);
$pete = array(
"name"=>"Dr. Aftlove or: How I Learned to Stop Worrying and Love Saido Berahino as a Second Round Pick sponsored by Torque, it’s what moves boulders, Memorial XV",
1	=>	205	,
2	=>	307	,
3	=>	130	,
4	=>	502	,
5	=>	114	,
6	=>	407	,
7	=>	198	,
8	=>	13	,
9	=>	462	,
10	=>	531	,
11	=>	517	,
12	=>	375	,
13	=>	62	,
14	=>	525	,
15	=>	81,
"score" => 0
);

$christ = array(
"name"=>"Cilla Black Memorial XV",
1	=>	395	,
2	=>	104	,
3	=>	379	,
4	=>	355	,
5	=>	86	,
6	=>	191	,
7	=>	189	,
8	=>	14	,
9	=>	482	,
10	=>	350	,
11	=>	441	,
12	=>	300	,
13	=>	129	,
14	=>	63	,
15	=>	293,
"score" => 0
);


$sam = array(
"name"=>"Repay Me Depay Kauto Star Roddy Piper Memorial XV",
1	=>	353	,
2	=>	79	,
3	=>	4	,
4	=>	302	,
5	=>	532	,
6	=>	216	,
7	=>	341	,
8	=>	416	,
9	=>	521	,
10	=>	51	,
11	=>	149	,
12	=>	275	,
13	=>	529	,
14	=>	74	,
15	=>	240	,
"score" => 0
);

#add_up($dan);
#add_up($holly);
#add_up($pete);
#add_up($christ);
#add_up($sam);
auto_sort($dan);

?>
