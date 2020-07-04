<?php
$host="localhost";
$uname="root";
$pwd="";
$link = mysql_connect($host,$uname,$pwd);
if (!$link)
  {
  die(mysql_error());
  }

mysql_selectdb("akdpcshr",$link);
?>