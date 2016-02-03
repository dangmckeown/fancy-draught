<?php

$style = <<<_css_

td  {display:inline;border: 1px black solid; width:150px;vertical-align:top;}

body{font-family: arial;}

@media screen and (max-width:500px){

table{background-color: #dddddd;}

h1 h2 h3 h4 h5{
font-size:10pt; font-weight: bold;
}

td {width:100%;}

}

@media screen and (min-width:501px){

h1 h2 h3 h4 h5{
font-size:15pt; font-weight: bold;
}
table{background-color: #ffffff;}
td {width:50%;}

} _css_;

?>
