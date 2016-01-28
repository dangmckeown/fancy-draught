<?php

// New file - try to monitor if there's any correlation between Fantasy Teams and reality

//set and populate teams array
$teams = array(

'Arsenal' => array('name' => 'Arsenal', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Aston Villa' => array('name' => 'Aston Villa', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Bournemouth' => array('name' => 'Bournemouth', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Chelsea' => array('name' => 'Chelsea', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Crystal Palace' => array('name' => 'Crystal Palace', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Everton' => array('name' => 'Everton', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Leicester' => array('name' => 'Leicester', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Liverpool' => array('name' => 'Liverpool', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Man City' => array('name' => 'Man City', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Man Utd' => array('name' => 'Man Utd', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Newcastle' => array('name' => 'Newcastle', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Norwich' => array('name' => 'Norwich', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Southampton' => array('name' => 'Southampton', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Spurs' => array('name' => 'Spurs', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Stoke' => array('name' => 'Stoke', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Sunderland' => array('name' => 'Sunderland', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Swansea' => array('name' => 'Swansea', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Watford' => array('name' => 'Watford', 'premier_league_points'=>0, 'fantasy_points'=>0),
'West Brom' => array('name' => 'West Brom', 'premier_league_points'=>0, 'fantasy_points'=>0),
'West Ham' => array('name' => 'West Ham', 'premier_league_points'=>0, 'fantasy_points'=>0),
'Unaccounted for' => array('name' => 'Unaccounted for', 'premier_league_points'=>0, 'fantasy_points'=>0)

);


//set players array to be populated from API
$players=array();

//get player info (659 available as of 28/01/2016)

for($i=1;$i<=659;$i++){
//raise to 659 and say a prayer
$url = "http://fantasy.premierleague.com/web/api/elements/" . $i . "/";
$result = file_get_contents($url);
$json = json_decode($result, true);
$players[] = $json;
} //end for $i

//assign players' fantasy points to team
foreach ($players as $player){
 $key = $player['team_name'];
 $teams[$key]['fantasy_points'] += $player['total_points'] ;
}


/*
 switch ($json['team_name']){
    case "Arsenal":
     $arsenal['fantasy_points'] += $json['total_points'];
     break;
     case "Aston Villa":
     $aston_villa['fantasy_points'] += $json['total_points'];
     break;
     case "Bournemouth":
     $bournemouth['fantasy_points'] += $json['total_points'];
     break;
    case "Chelsea":
     $chelsea['fantasy_points'] += $json['total_points'];
     break;
     case "Crystal Palace":
     $crystal_palace['fantasy_points'] += $json['total_points'];
     break;
     case "Everton":
     $everton['fantasy_points'] += $json['total_points'];
     break;
     case "Leicester":
     $leicester['fantasy_points'] += $json['total_points'];
     break;
    case "Liverpool":
     $liverpool['fantasy_points'] += $json['total_points'];
     break;
    case "Man City":
     $man_city['fantasy_points'] += $json['total_points'];
     break;
     case "Man Utd":
     $man_utd['fantasy_points'] += $json['total_points'];
     break;
     case "Newcastle":
     $newcastle['fantasy_points'] += $json['total_points'];
     break;
    case "Norwich":
     $norwich['fantasy_points'] += $json['total_points'];
     break;
     case "Southampton":
     $southampton['fantasy_points'] += $json['total_points'];
     break;
     case "Spurs":
     $spurs['fantasy_points'] += $json['total_points'];
     break;
     case "Stoke":
     $stoke['fantasy_points'] += $json['total_points'];
     break;
    case "Sunderland":
    $sunderland['fantasy_points'] += $json['total_points'];
    break;
    case "Swansea":
    $swansea['fantasy_points'] += $json['total_points'];
     break;
     case "Watford":
     $watford['fantasy_points'] += $json['total_points'];
     break;
     case "West Brom":
     $west_brom['fantasy_points'] += $json['total_points'];
     break;
    case "West Ham":
     $west_ham['fantasy_points'] += $json['total_points'];
     break;
     default:
     $unaccounted += $json['total_points'];
   
   } //end switch
*/



foreach ($teams as $team){
 echo $team['name'] . " " . $team['fantasy_points'] . "<br />";
}

#echo $man_city['Name'] . " = " . $man_city['Fantasy Points'];

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


*/

?>
