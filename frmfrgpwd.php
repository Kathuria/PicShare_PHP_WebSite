<?php
include_once 'Buslogic.php';
session_start();
if(isset($_POST["btnsub"]))
{
    $obj=new clspsreg();
    $pwd=$obj->frgpwd($_POST["txteml"]);
    if($pwd==NULL)
        $msg="Email Not Registered";
    else
    {
        $to       = $_POST["txteml"];
        $subject  = 'Password Retreival Mail';
        $message  = "As per your request for new password for PicShare,<br> Your Password is".$pwd."<br><br> For your safety please change your password ASAP";
        $headers  = 'From: uploaderak@gmail.com' . "\r\n" .
                    'Reply-To: uploaderak@gmail.com' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n" .
                    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
    if(mail($to, $subject, $message, $headers))
        $msg="Password has been sent to your MailId";
    else
        $msg="Password sending Failed";
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
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="css/colour.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="images/logo.png" type="image/png">
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>

<body>
  <div id="main">

    <!-- begin header -->
    <header>
      <div id="logo"><h1><a href="index.php">Pic Share</a></h1></div>
      <nav>
         <ul class="sf-menu" id="nav">
          <li><a href="index.php">Home</a></li>
          <li class="selected"><a href="frmfrgpwd.php">Change Password</a></li>
        </ul>
      </nav>
    </header>
    <!-- end header -->

    <!-- begin content -->
    <div id="site_content">
	<h2 align="center">Password Retreival</h2>
        <img src="images/pwd.jpg" width="400" height="200" align="left" alt="">
        <form name="f1" method="POST" action="frmfrgpwd.php">
        
        <p>
<table width="50%" align="center">
    
    <tr>
        <td width="150px"> &nbsp;&nbsp;&nbsp;&nbsp;Enter Email Id</td>
        <td>
            <input type="text" name="txteml" required placeholder="email@example.com"/>
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" size="4">
            <input type="submit" name="btnsub" value="Retrieve Password"/> 
        </td>
    
    <tr>
        <td colspan="2">
            <?php
            if(isset($msg))
                echo $msg;
            ?>
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
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript" src="js/image_fade.js"></script>
  <!-- initialise sooperfish menu -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>
