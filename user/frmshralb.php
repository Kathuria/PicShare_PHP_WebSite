<?php

include_once '../Buslogic.php';
session_start();

if(isset($_REQUEST["acod"]))
{
    $_SESSION["albcod"]=$_REQUEST["acod"];
    
}

if(isset($_REQUEST["btnsub"]))
{
    $obj=new clspsshr();
    $obj->shralbcod=$_SESSION["albcod"];
    $obj->shrregcod=$_POST["drpshr"];
    $obj->Save_Rec();
    unset($_SESSION["albcod"]);
    header("location:frmalb.php");
}

?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Pic Share By Ak</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <!-- stylesheets -->
  <link href="../css/style.css" rel="stylesheet" type="text/css" />
  <link href="../css/colour.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="../images/logo.png" type="image/png">
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="../js/modernizr-1.5.min.js"></script>
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
        <h1 align="center">Share Album </h1>
    <img src="../images/Album.jpg" align="left" width="400" height="200" alt="">  
   <form name="f1" action="frmshralb.php" method="POST">   
     <p>
    
<table width="50%" align="right">
    <h2 align="center">Album:&nbsp;&nbsp;
    <?php 
    $obj=new clspsalb();
    $obj->Find_Rec($_SESSION["albcod"]);
    echo $obj->albtit;
    ?>
    </h2>
    <tr>
     <td>Share with</td>
        <td width="400px">
            <select name="drpshr">
                <?php 
                $obj=new clspsshr();
                $arr=$obj->DispAlbShr($_SESSION["albcod"]);
                for($i=0;$i<count($arr);$i++)
                {
                     if($arr[$i][0]!=$_SESSION["cod"])
                    echo "<option value=".$arr[$i][0].">".$arr[$i][1]."</option>";
                     
                }
                ?>
                
          </select>
        </td>
    </tr>
    <tr>
    <td></td>
    <td><br>
        <input type="Submit" value="Submit" name="btnsub"/>&nbsp;&nbsp;&nbsp;&nbsp;
     <input type="Reset" value="Cancel" name="btncan"/>
    </td>
    </tr>
</table>
     </p>
    </form>
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
