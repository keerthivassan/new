<?php

$user_timestamp = date('Y-m-d G:i');
$title_bgcolor = "#222F43";
$content_bgcolor = "#000000";
$border_color = "#AAAAAA";
$last_id = 0;

require ('chatconfig.inc.php');
require ('functions.inc.php');
require ('db_functions.inc.php');

echo "<HTML><HEAD><TITLE>php-chat user info</TITLE>";
echo "<meta http-equiv=\"refresh\" content=\"30\">";

echo "</HEAD>";

echo "<BODY BGCOLOR=#000000 TEXT=#FFFFFF>";

// Connect to the database server

mysql_pconnect($dbserver,$chatdbuser,$pass) or die("Unable to connect to dbserver $dbserver!");
mysql_select_db($db) or die("Unable to select database $db!");

$query = "SELECT * FROM `" . $table_prefix . "chatusers` ORDER BY `alias`";
$result = mysql_query($query) or die("$query failed!");
$count = mysql_num_rows($result);

echo "<CENTER>";

echo "<TABLE BORDER=0 CELLSPACING=5 CELLPADDING=2 WIDTH=180>";
echo "<TD BGCOLOR=$title_bgcolor><FONT FACE=VERDANA,ARIAL,HELVETICA SIZE=2>Total users:</TD>";
echo "<TD BGCOLOR=#333333><FONT FACE=VERDANA,ARIAL,HELVETICA SIZE=2>" . $count . "</TD>";
echo "</TABLE>";

echo "<TABLE BORDER=0 CELLSPACING=5 CELLPADDING=2 WIDTH=180>";
echo "<TD BGCOLOR=$title_bgcolor><FONT FACE=VERDANA,ARIAL,HELVETICA SIZE=2>User</TD>";
echo "<TD BGCOLOR=$title_bgcolor><FONT FACE=VERDANA,ARIAL,HELVETICA SIZE=2>Room</TD>";
echo "<TR>";

while ($row = mysql_fetch_row($result))
{
	echo "<TD><FONT FACE=VERDANA,ARIAL,HELVETICA SIZE=2>" . $row[1] . "</TD>";
	echo "<TD><FONT FACE=VERDANA,ARIAL,HELVETICA SIZE=2>" . get_room_name_by_id( $row[5] ) . "</TD>";
	echo "<TR>";
}
echo "</TABLE>";

echo "</BODY>";
echo "</HTML>";