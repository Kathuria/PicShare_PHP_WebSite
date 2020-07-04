<?php
include_once '../Buslogic.php';
        session_start();
        
 if(isset($_REQUEST["acod"]))
     $_SESSION["alcod"]=$_REQUEST["acod"];
 
  if(isset($_REQUEST["btnsub"]))
  {
      $obj= new clspsalbpic();
      $obj->albpicalbcod=$_SESSION["alcod"];
      $obj->albpicdsc=$_POST["txtdsc"];
      $s=$_FILES["fileupl"]["name"];
      $s= substr($s, strpos($s,'.'));    //just to pick file's extension only as 1st string then 
      $obj->albpicfil=$s;
      $a=$obj->Save_Rec();
      move_uploaded_file($_FILES["fileupl"]["tmp_name"],"../albpics/".$a.$s);
  }
   
  if(isset($_REQUEST["pcod"]))
  {
      if($_REQUEST["mod"]=='D')
      {
          $obj= new clspsalbpic();
          $obj->albpiccod=$_REQUEST["pcod"];
          $obj->Delete_Rec($obj->albpiccod);
      }
      else 
      {
          $obj= new clspsalb();
          $obj->albcod=$_SESSION["alcod"];
          $obj->albcvrpiccod=$_REQUEST["pcod"];
          $obj->UpdatecvrPic();
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
  <link rel="shortcut icon" href="../images/logo.png" type="image/png">
  <!-- stylesheets -->
  <link href="../css/style.css" rel="stylesheet" type="text/css" />
  <link href="../css/colour.css" rel="stylesheet" type="text/css" />
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
          <li><a href="frmrpt.php">Suggestion/Report</a></li>
          <li><a href="signin.php">Signout</a></li>
        </ul>
      </nav>
    </header>
    <!-- end header -->

    <!-- begin content -->
    <div id="site_content">
<p>
<form name="f1" action="frmuplpic.php" method="POST" enctype="multipart/form-data">   
<table width="500" align="center" >
    <tr>
        <td>
            Select Picture
        </td>
        <td>
            <input type="file" name="fileupl"/>
        </td>
    </tr>
    <tr>
        <td>
            Description
        </td>
        <td>
            <textarea name="txtdsc" rows="4" cols="30">
            </textarea>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" name="btnsub" value="Upload Picture"/>
        </td>
    </tr>
</table>
    
    <hr></hr>           <!- horizontal -!>
    <table>
    <?php 
    $obj= new clspsalbpic();
    $arr=$obj->Disp_Rec($_SESSION["alcod"]);    
    for($i=0;$i<count($arr);$i++)
    {
        if($i==0 || $i%4==0)        //so that at 1 time show 5 images
            echo "<tr>";
            
            echo "<td width='21%'>";
            echo "<br><img src=../albpics/".$arr[$i][0].$arr[$i][2]." height=160px width=180px/>";      //here it get albpiccod(pic name) with its extension
            echo "<br><a href=frmuplpic.php?pcod=".$arr[$i][0]."&mod=C >Set as cover Pic</a>";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=frmuplpic.php?pcod=".$arr[$i][0]."&mod=D >Delete Pic</a>";      
            echo "</td>";
            
            if($i!=0 && $i%3==0)
            echo "</tr>";
    }
    ?>
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


