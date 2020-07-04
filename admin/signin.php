
<?php
include_once 'link.php';

if(isset($_POST["btnlogin"]))
{
    $un=$_POST["txtuname"];
    $up=$_POST["txtupass"];
    $qry="Call admincheck('$un','$up',@cod)";
    $res= mysql_query($qry)or die(mysql_error());
    $res1= mysql_query("select @cod"); //this accesses the out parameter
    $r= mysql_fetch_row($res1);
   
    if($r[0]==-1)
    {
        echo 'Invalid Email/Password';
        
    }
    if($r[0]==1)
    {
        session_start();
         $_SESSION["cod"]=$r[0];
         header("location:frmalb.php");
    }
}
/*{
    $obj=new clspsreg();
    $obj->regeml=$_POST["txtuname"];
     $obj->regpwd=$_POST["txtupass"];
     $a=$obj->admincheck();
     if($a==-1)
         echo 'Invalid User';
     if($a==-2)
         echo 'Wrong Password';    
     else if($a==1){
         $_SESSION["cod"]=$a;       //user login rememberence, session is used to store values
        header("location:../index.php");        //to send user to particular page
     }
}
*/
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> PicShare Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/logo.png" type="image/png">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="signin.php" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="Email address" name="txtuname">
        <input type="password" class="input-block-level" placeholder="Password" name="txtupass">
        
        <button class="btn btn-large btn-primary" type="submit" name="btnlogin">Sign in</button>
      </form>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
