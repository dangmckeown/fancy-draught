<?php

// New file - try to monitor if there's any correlation between Fantasy Teams and reality

//set and populate teams array

$teams = array();

for($i=1;$i<=659;$i++){

 $url = "http://fantasy.premierleague.com/web/api/elements/" . $i . "/";
    $content = file_get_contents($url);
    $json = json_decode($content, true);
    
   switch ($json['team_name']){
    case "Arsenal":
     $arsenal['fantasy points'] += $json['total_points'];
     break;
     case "Aston Villa":
     $aston_villa['fantasy points'] += $json['total_points'];
     break;
     case "Bournemouth":
     $bournemouth['fantasy points'] += $json['total_points'];
     break;
    case "Chelsea":
     $chelsea['fantasy points'] += $json['total_points'];
     break;
     case "Crystal Palace":
     $crystal_palace['fantasy points'] += $json['total_points'];
     break;
     case "Everton":
     $everton['fantasy points'] += $json['total_points'];
     break;
     case "Leicester":
     $leicester['fantasy points'] += $json['total_points'];
     break;
    case "Liverpool":
     $liverpool['fantasy points'] += $json['total_points'];
     break;
    case "Man City":
     $man_city['fantasy points'] += $json['total_points'];
     break;
     case "Man Utd":
     $man_utd['fantasy points'] += $json['total_points'];
     break;
     case "Newcastle":
     $newcastle['fantasy points'] += $json['total_points'];
     break;
    case "Norwich":
     $norwich['fantasy points'] += $json['total_points'];
     break;
     case "Southampton":
     $southampton['fantasy points'] += $json['total_points'];
     break;
     case "Spurs":
     $spurs['fantasy points'] += $json['total_points'];
     break;
     case "Stoke":
     $stoke['fantasy points'] += $json['total_points'];
     break;
    case "Sunderland":
     $sunderland['fantasy points'] += $json['total_points'];
     break;
         case "Swansea":
          $swansea['fantasy points'] += $json['total_points'];
     break;
     case "Watford":
     $watford['fantasy points'] += $json['total_points'];
     break;
     case "West Brom":
     $west_brom['fantasy points'] += $json['total_points'];
     break;
    case "West Ham":
     $west_ham['fantasy points'] += $json['total_points'];
     break;
     default:
     $unaccounted += $json['total_points'];
   
   } //end switch

} //end for $i

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
