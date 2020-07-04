<?php

define("server","localhost");
define("uname","root");
define("pwd","");
//define("port","8081");
define("dname","akdpcshr");
class clscon        //By default public
{
  function __construct()        //Constructor of Class
    {
      mysql_connect(server,uname,pwd) or die("Unable to Conect Server". mysql_error());
      mysql_select_db(dname) or die("Unable to Connect Database". mysql_error());
      
  }  
}
?>
