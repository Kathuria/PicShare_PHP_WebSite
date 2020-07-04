<?php
include_once '../Buslogic.php';
        session_start();
     
if(isset($_REQUEST["acod"]))
{
    $obj=new clspsalb();
    $obj->albcod=$_REQUEST["acod"];
    $obj->Delete_Rec($obj->albcod);
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
      <form name="f1" action="frmalb.php" method="POST">  
    <p>
    <h2>&nbsp;&nbsp;My Albums</h2>
    <table width="100%" align="center">
    <?php
    $obj=new clspsalb();
    $arr=$obj->Disp_Rec($_SESSION["cod"]);      //This code is passed which is same with that code with user login  "cod"
    for($i=0;$i<count($arr);$i++)       //Here it displays no. of albums for particular user and this will execute by count function counts all albums
    {
     if($i==0 || $i%5==0)   
     echo "<tr>";
     
     echo "<td width='20%'>";
     if($arr[$i][5]==-1)
        echo "&nbsp;&nbsp;<a href=frmviewalb.php?acod=".$arr[$i][0]." ><img src='../images/Ak.jpg' height=120px width=120px/></a>";  //Default image of album cover
      else
         echo "&nbsp;&nbsp;<a href=frmviewalb.php?acod=".$arr[$i][0]." ><img src='../albpics/".$arr[$i][5]."' height=120px width=120px/></a>";      //In Next class perform editing here 
           
             echo "<br>&nbsp;&nbsp;<strong><a href=frmviewalb.php?acod=".$arr[$i][0]." >".$arr[$i][1]."</a></strong>";     //At 0th col albcod and at 1st col is title
             echo "<br><br>&nbsp;&nbsp;<a href=frmnewalb.php?acod=".$arr[$i][0].">Edit</a>";        //Here acod is albumcode in tbalb table
             echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style='color:Red' href=frmalb.php?acod=".$arr[$i][0].">Delete</a>";
             echo "<br>&nbsp;&nbsp;<a href=frmshralb.php?acod=".$arr[$i][0].">Share</a>";
             echo "&nbsp;&nbsp;<a href=frmuplpic.php?acod=".$arr[$i][0].">Update</a>";
             echo "</td>";
             
             if($i!=0 && $i%4==0)
             echo "</tr>";
    }  
    ?>
    </table>
    <h2><br>&nbsp;&nbsp;Shared Albums</h2> 
    <table width="100%" align="center">
    <?php
    $obju=new clscon();
    $obj=new clspsalb();
    $arr=$obj->DispShrAlb($_SESSION["cod"]);
    for($i=0;$i<count($arr);$i++)
    {
     if($i==0 || $i%5==0)   
     echo "<tr>";
     
       echo "<td width='20%'>";
     
     if($arr[$i][5]==-1)
        echo "&nbsp;&nbsp;<a href=frmviewalb.php?acod=".$arr[$i][0]." ><img src='../images/Ak.jpg' height=120px width=120px/></a>";  //Default image of album cover
      else
         echo "&nbsp;&nbsp;<a href=frmviewalb.php?acod=".$arr[$i][0]." ><img src='../albpics/".$arr[$i][5]."' height=120px width=120px/></a>";      //In Next class perform editing here 
         
      echo "<br>&nbsp;&nbsp;<strong><a href=frmviewalb.php?acod=".$arr[$i][0]." >".$arr[$i][1]."</a></strong>";
      echo "</td>";
             
            if($i!=0 && $i%4==0)
             echo "</tr>";
    }  
    ?>
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
