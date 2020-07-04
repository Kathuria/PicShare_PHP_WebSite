<?php

include_once '../Buslogic.php';
session_start();

if(isset($_POST["btnsub"]))
{
    $obj=new clspsalb();
    $obj->albtit=$_POST["txttit"];
    $obj->albdsc=$_POST["txtdsc"];
     $obj->albregcod=$_SESSION["cod"];
    $obj->albdat=date('Y-m-d');
    $obj->albcvrpiccod=-1;
    if(isset($_SESSION["acod"]))
    {
      $obj->albcod=$_SESSION["acod"];
      $obj->Update_Rec();
      unset($_SESSION["acod"]);     //unset=To Destroy te variable
    }
    else 
    {
        $a=$obj->Save_Rec();
        if($a==TRUE)
        {    
         echo 'Album Created';
        }
        else 
         {
        echo 'Try Again!!!!!!!!!!!!';    
        }
    }
    header("location: frmalb.php");   
    
}

if(isset($_REQUEST["acod"]))        //Here we got acod from frmalb Edit link then passed acod to query string and received here
{
    $_SESSION["acod"]=$_REQUEST["acod"];              //to retain query string value
    $obj=new clspsalb();
    $obj->Find_Rec($_REQUEST["acod"]);
    $tit=$obj->albtit;
    $dsc=$obj->albdsc;
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
          <li><a href="frmalb.php">Albums</a></li>
          <li class="selected"><a href="frmnewalb.php">Create New Album</a></li>
          <li><a href="frmrpt.php">Suggestion/Report</a></li>
          <li><a href="../index.php">Signout</a></li>
        </ul>
      </nav>
    </header>
    <!-- end header -->

    <!-- begin content -->
    <div id="site_content">
	<img src="../images/Album.jpg" align="right" width="400" height="200" alt="">
<p>
     <h2 align="center">New Album</h2>
<form name="f1" action="frmnewalb.php" method="POST">   
<table width="100" align="center">
    <tr>
        <td width="10px">&nbsp;&nbsp;Album Title</td>
        <td>
            <input type="text" name="txttit" width="400px" value="<?php if(isset($tit)) echo $tit; ?>"/>
        </td>
    </tr>
    
    <tr>
        <td width="10px">&nbsp;&nbsp;Description&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;
            <textarea name="txtdsc" rows="4" cols="30">
            <?php 
            if(isset($dsc)) 
                echo $dsc; 
            ?>
            </textarea>
        </td>    
    </tr>
    
    <tr>
        <td width="5px" ></td>
        <td>
        <input type="submit" name="btnsub" value="Submit" />
        <input type="reset" name="btncan" value="Cancel"/>      <!- Do its Code -!>
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


