<?php
include_once '../Buslogic.php';
        session_start();
     
if(isset($_POST["btnrpt"]))
{
            $obj=new clspsreg();
            $obj->regnam=$_POST["txtnam"];
            $obj->picnam=$_POST["txtpic"];
            $obj->regdat= date("Y-m-d");
            $obj->picrpt=$_POST["txtrpt"];
            $b=$obj->Save_Rep();
            if($b==TRUE)
             {
                 $msg="Report Submitted Successfully";
             }
             if ($b==FALSE)
             {
               $msg="Error in Submission, Try again";
             }
}

if(isset($_POST["btnsug"]))
{
            $obj=new clspsreg();
            $obj->regsug=$_POST["txtsug"];
            $obj->regdat= date("Y-m-d");
            $b=$obj->Save_Sug();
            if($b==TRUE)
             {
                 $msg="Thanks for Submitting your valuable suggestion";
             }
             if ($b==FALSE)
             {
               $msg="Error in Submission, Try again";
             }
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
          <li><a href="frmnewalb.php">Create New Album</a></li>
          <li class="selected"><a href="frmrpt.php">Suggestion/Report</a></li>
          <li><a href="../index.php">Signout</a></li>
        </ul>
      </nav>
    </header>
    <!-- end header -->

    <!-- begin content -->
    <div id="site_content">
        <div style="width: 100%;">
    <div style="float:left; width: 50%">
    
      <form name="f1" action="frmrpt.php" method="POST">  
    <p>
    <h2>&nbsp;&nbsp;Report</h2>
    <table width="100%" align="centre">    
    <tr>
        <td width="130px">Album Name</td>
        <td>
            <input type="text" name="txtnam" required placeholder="Album to report"/>
        </td>
    </tr>
    <tr>
        <td width="130px">Pic Name</td>
        <td>
            <input type="text" name="txtpic" required placeholder="Pic Name to report"/>
        </td>
    </tr>
    <tr>
        <td width="130px">Explain Report</td>
        <td>
            <textarea name="txtrpt" rows="3" cols="22" required placeholder="Enter your report deatils here"></textarea>
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" size="4">
            <input type="submit" name="btnrpt" value="Report"/> 
        </td>
    </tr>
   <tr>
        <td colspan="2">
            <?php
            if(isset($msg))
            {
                echo $msg;
                
            }
            ?>
        </td>
    </tr>
    </div>
</table>
</p>
    </form>
        </div>
    <div style="float:right;">
    
      <form name="f2" action="frmrpt.php" method="POST">  
    <p>
    
    <h2>&nbsp;&nbsp;Suggestion</h2>
    <table width="100%" align="centre">    
    <tr>
        <td>
            <textarea name="txtsug" rows="6" cols="50" required placeholder="Enter your valuable suggestion here"></textarea>
        </td>
    </tr>
    
    <tr>
        <td></td>
        <td colspan="2" size="4">
            <input type="submit" name="btnsug" value="Submit" /> 
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <?php
            if(isset($msg))
            {
                echo "<script>alert('$msg')</script>";
            }
            ?>
        </td>
    </tr>
   
</table>
</p>
    </form>
            </div>
        </div>        
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
