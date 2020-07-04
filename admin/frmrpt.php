<?php
include_once 'link.php';
        session_start();
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
          <li class="selected"><a href="frmrpt.php">Suggestion/Report</a></li>
          <li><a href="../index.php">Signout</a></li>
        </ul>
      </nav>
    </header>
    <!-- end header -->

    <!-- begin content -->
    <div id="site_content">
        <div style="width: 100%;">
    <div style="float:left; width: 100%">
    
      <form name="f1" action="frmrpt.php" method="POST">  
    <p>
    <h2>&nbsp;&nbsp;Reports</h2>
    <table width="100%" align="centre" border="1"> 
        <tr>
            <th>Sr No.</th>
            <th>Alb_Name</th>
            <th>Pic_Name</th>
            <th>Date</th>
            <th>Report</th>
        </tr>
                <tr>
                    <td style="width:6%">
                        <?php
                        $serial = 1;
                        $qry="select * from tbrpt";
                        $res=  mysql_query($qry);
                        while ($r = mysql_fetch_row($res))
                        {    
                          echo $serial++;
                          echo "<br>";
                        }
                        ?>
                    </td>
                    <td style="width:10%">
                        
                        <?php
                        $qry="select * from tbrpt";
                        $res=  mysql_query($qry)or die(mysql_error());     
                        while($r = mysql_fetch_row($res))     
                        {
                         
                         echo "$r[0]<br>";      
                        }
                        ?>
                    </td>
                    <td style="width:10%">
                        
                        <?php
                       $qry="select * from tbrpt";
                        $res=  mysql_query($qry)or die(mysql_error());     
                        while($r = mysql_fetch_row($res))     
                        {
                         
                         echo "$r[1]<br>";      
                        }
                        ?>
                    </td>
                    <td style="width:10%">
                     
                        <?php
                        $qry="select * from tbrpt";
                        $res=  mysql_query($qry)or die(mysql_error());     
                        while($r = mysql_fetch_row($res))     
                        {
                         
                         echo "$r[2]<br>";      
                        }
                        ?>
                    </td>
                    <td>
                     
                        <?php
                        $qry="select * from tbrpt";
                        $res=  mysql_query($qry)or die(mysql_error());     
                        while($r = mysql_fetch_row($res))     
                        {
                         
                         echo "$r[3]<br>";      
                        }
                        ?>
                    </td>
                </tr>
</table>
</p>
    </form>
        </div>
    <div style="float:left;">
    
      <form name="f2" action="frmrpt.php" method="POST">  
    <p>
    
    <h2>&nbsp;&nbsp;Suggestions</h2>
     <table width="100%" align="centre" border="1"> 
        <tr>
            <th>Sr No.</th>
            <th>Suggestion</th>
            <th>Date</th>
        </tr>
        <tr>
                    <td style="width:5%" >
                
                        <?php
                        $serial = 1;
                        $qry="select * from tbsug";
                        $res=  mysql_query($qry);
                        while ($r = mysql_fetch_row($res))
                        {    
                          echo $serial++;
                          echo "<br>";
                        }
                        ?>
                    </td>
                    <td>
                        
                        <?php
                       $qry="select * from tbsug";
                        $res=  mysql_query($qry)or die(mysql_error());     
                        while($r = mysql_fetch_row($res))     
                        {
                         
                         echo "$r[1]<br>";      
                        }
                        ?>
                    </td>
                    <td style="width:10%">
                     
                        <?php
                        $qry="select * from tbsug";
                        $res=  mysql_query($qry)or die(mysql_error());     
                        while($r = mysql_fetch_row($res))     
                        {
                         
                         echo "$r[2]<br>";      
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
