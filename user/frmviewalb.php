<?php

include_once '../Buslogic.php';
session_start();

if(isset($_REQUEST["acod"]))
{
    $_SESSION["albcod"]=$_REQUEST["acod"];
}

if(isset($_POST["btnsub"]))
{
    $obj=new clspscmt();
    $obj->cmtalbpiccod=$_POST["drppic"];
    $obj->cmtdat=date('y-m-d');
    $obj->cmtdsc=$_POST["txt1"];
    $obj->cmtregcod=$_SESSION["cod"];   //Check
    $obj->Save_Rec();       //Check
}

/*if(isset($_REQUEST["acod"]))        //Here we got acod from frmalb Edit link then passed acod to query string and received here
{
    $_SESSION["acod"]=$_REQUEST["acod"];              //to retain query string value
    $obj=new clspsalb();            //this block Code is Not for report
    $obj->Find_Rec($_REQUEST["acod"]);
    $tit=$obj->albtit;
    $dsc=$obj->albdsc;
}*/

?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Pic Share By Ak</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <!-- stylesheets -->
<link href="css/lightbox.css" rel="stylesheet" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
  <link href="../css/colour.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="../images/logo.png" type="image/png">
<script type="text/javascript" src="../jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../jquery/jquery.gallerax-0.2.js"></script>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/lightbox-2.6.min.js"></script>
<script type="text/javascript" src="../js/disable.js"></script>
 <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="../js/modernizr-1.5.min.js"></script>
<script language='JavaScript' type='text/JavaScript'> 
    
 var tenth = ''; 
 
 function right() { 
   if (document.all) { 
     (tenth); 
     alert("Right Click Disabled"); 
     return false; 
   } 
 } 
 
 function block(e) { 
   if (document.layers || (document.getElementById && !document.all)) { 
     if (e.which == 2 || e.which == 3) { 
       (tenth); 
       return false; 
     } 
   } 
 } 
 if (document.layers) { 
   document.captureEvents(Event.MOUSEDOWN); 
   document.onmousedown = block; 
 } else { 
   document.onmouseup = block; 
   document.oncontextmenu = right; 
 } 
 document.oncontextmenu = new Function('alert("Right Click Disable"); return false') 
</script>

</head>

<body>
  <div id="main">

    <!-- begin header -->
    <header>
     <div id="logo"><h1><a href="index.php">Pic Share</a></h1></div>
      <nav>
         <ul class="sf-menu" id="nav">
          <li class="selected"><a href="frmalb.php">Albums</a></li>
          <li><a href="frmnewalb.php">Create New Album</a></li>
          <li><a href="frmrpt.php">Suggestion/Report</a></li>
          <li><a href="../index.php">Signout</a></li>
        </ul>
      </nav>
    </header>
    <!-- end header -->

    <!-- begin content -->
    <div id="site_content">
<p>
     <h2 align="left">&nbsp;&nbsp;&nbsp;
        <?php 
        $obj=new clspsalb();
        $obj->Find_Rec($_SESSION["albcod"]);
        echo $obj->albtit;
        ?>
    </h2>  
    
<form name="f1" action="frmviewalb.php" method="POST">   
     <div id="abc"> 
<table width="100%" align="center">
  <?php
  $oiuu=new clscon();
  $obj1=new clspsalbpic();
  $arr=$obj1->Disp_Rec($_SESSION["albcod"]);
  $q=array(); 
  for($i=0;$i<count($arr);$i++)       
   {
      $q[$i]=$arr[$i][0];
      $a=$i+1;
       if($i==0 || $i%8==0)     //Row will be started after 5 columns
           echo "<tr>";
       
       echo "<td align='center' width='10%'>";
       echo "<b>".$a."</b>";
       $obj1=new clspscmt();
       $str=$obj1->DispPicCmt($arr[$i][0]);
       //echo $str;
       echo "<br><a href=../albpics/".$arr[$i][0].$arr[$i][2]." Title='".$str."' data-lightbox=image-1>";   //Alb Pic Path[2]
      //echo "<a href=../albpics/".$arr[$i][0].$arr[$i][2]." Title='".$str."'>";    //Title will be displyed through str
       
       echo "<img src=../albpics/".$arr[$i][0].$arr[$i][2]." border=1 height=100px width=100px />";
       echo '</a><br>';     //Applying anchor tag on image 
       echo $arr[$i][3];
       //echo "&nbsp;&nbsp;&nbsp;<a href=frmviewalb.php?acod=".$arr[$i][0].">Report</a>";  
          echo "</td>";
          
          if($i!=0 && $i%7==0)
       echo "</tr>";
          
   }
 
  ?>  
</table>
  </div>
    <h3><br>POST Comments</h3>
    <table>
        <tr>
            <td>Select Picture No.</td>
            <td>
                <select name="drppic">
                 <?php 
                 for($i=0;$i<count($q);$i++)
                 {
                     $a=$i+1;
                     echo "<option value=".$q[$i]."/>".$a;
                 }
                 ?>   
                    
                </select>
            </td>
        </tr>
        <tr>
            <td>Comment</td>
            <td>
                <textarea name="txt1" rows="5" cols="31"></textarea>
            </td>
        </tr>
        <tr>
         <td align="right">
          <input type="submit" value="Submit" name="btnsub"/>
         </td>
        </tr>
    </table>
    
    
    
    </form>
</p>
 </div>
    <!-- end content -->

    <!-- begin footer -->
    <footer>
     Project By: Avi Kathuria
      
    </footer>
    <!-- end footer -->

  </div>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="../js/jquery.sooperfish.js"></script>
  <script type="text/javascript" src="../js/image_fade.js"></script>
  <!-- initialise sooperfish menu -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>

