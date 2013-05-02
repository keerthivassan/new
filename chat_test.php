<?php

$regexp = "#006af4";

if (eregi("^#([0-9a-fA-F]{6})$", $regexp))
{
	echo "String is valid";
} else
{
	echo "String is not valid";
}

?>