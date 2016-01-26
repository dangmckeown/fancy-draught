<?php
//=========
//== RECREATE INDEX FILE, TRY TO AUTOSORT TEAMS
//=========
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
      case "Defender":
        $df[] = $json;
        break;
      case "Midfielder":
        $md[] = $json;
        break;
      default:
        $fw[] = $json;
  
} //end switch
}//end for

//bench lower scoring goalie

echo $gk[0]['first_name'];
echo " ";
echo $gk[1]['second_name'];

/* COMMENT OUT FOR TESTING 
if ($gk[0]['total_points'] > $gk[1]['total_points'] ){
echo $gk[0]['second_name'];
 $bench[] = $gk[1];
 $pitch[] = $gk[0];
}
else
{
  echo $gk[1]['second_name'];
$bench[] = $gk[0];
 $pitch[] = $gk[1];
}
*/

#foreach ($pitch as $pit){
#  echo "<p>" . $pit['second_name']. ", " .$pit['type_name'] . "</p>";
#}
  
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

add_up($dan);
add_up($holly);
add_up($pete);
add_up($christ);
add_up($sam);
auto_sort($dan);

?>
