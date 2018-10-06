<?php
session_start();
 
$dbhost = "fdb17.awardspace.net"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "2846509_candidates"; // the name of the database that you are going to use for this project
$dbuser = "2846509_candidates"; // the username that you created, or were given, to access your database
$dbpass = "codeforgood2018"; // the password that you created, or were given, to access your database
 
$dbcon = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, 3306) or die("MySQL Error: " . mysql_error());
mysqli_select_db($dbcon, $dbname) or die("MySQL Error: " . mysql_error());
?>