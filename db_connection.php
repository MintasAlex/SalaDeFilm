<?php
function OpenCon()
 {
 $dbhost = "eu-cdbr-west-02.cleardb.net";
 $dbuser = "bf17231366db58";
 $dbpass = "244fc2b2";
 $db = "heroku_ac4c3e4e4267083";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>