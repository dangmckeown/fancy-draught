# fancy-draught
Automatic-updating league table for our Fantasy League Draft, integrating data from fantasy.premierleague.com API

On the day of the Community Shield match between Arsenal and Chelsea, we gathered in the Porterhouse near covent garden, clutching handfuls of notes, ready for our inaugural Fantasy League draft.

The rules:

* Take it in turns to pick. 
* The last manager to pick in round one gets first pick in round two and the picking order is reversed
* Pick a squad of 15: two goalies, five defenders, five midfielders, three attackers
* The real game-changer: pick no more than one player per Premier League team
* Don't use any tech - bring your research with you

The first round of the draft went as might be expected: Rooney and Aguero, top scorers from last year, were quickly off the table. The second round was where the 'one player from each team' rule came into play. Pete's decision to hit West Brom early and take Saido Berahino led to a run on West Brom assets. Then, with all of Arsenal, Chelsea, Man City and Liverpool to choose from, I snapped up Liam Cresswell from West Ham.

About this app:

* https://fancy-draught-2015-16.herokuapp.com/
* Teams stored in arrays in teams.php
* Functions stored in functions.php 
* get_min($array) finds lowest scorer from a selection of players
* auto_sort($team) uses get_min to bench one goalie and three outfielders, then lays out the rest of the squad with scores
* header.php and footer.php lend html basics
* index.php calls the whole lot together and renders
* external CSS not working at present
