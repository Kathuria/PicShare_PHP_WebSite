<?php
include_once 'Buslogic.php';
session_start();

if(isset($_SESSION["cod"])) //To Logout
{
    unset($_SESSION["cod"]);    //To destroy user session
}

if(isset($_POST["btnsub"]))
{
    $obj=new clspsreg();
    $obj->regeml=$_POST["txtleml"];
     $obj->regpwd=$_POST["txtlpwd"];
     $a=$obj->logincheck();
     if($a==-1)
         $msgerr="Email/Passowrd Incorrect";
     else {
         $_SESSION["cod"]=$a;       //user login rememberence, session is used to store values
        header("location:user/frmalb.php");        //to send user to particular page
     }
}

if(isset($_POST["btnsub2"]))
{
    if($_POST["txtpwd"]!=$_POST["txtconpwd"] )
        $msg="Password & Confirm Password doesn't match";
       
    else 
    {
        try
        {
            $obj=new clspsreg();
            $obj->regnam=$_POST["txtnam"];
            $obj->regeml=$_POST["txteml"];
            $obj->regpwd=$_POST["txtpwd"];
            $obj->regdat= date("Y-m-d");
            $b=$obj->Save_Rec();
            if($b==TRUE)
             {
                 $msg="Registration Successful";
             }
             if ($b==FALSE)
             {
               $msg="Email Id already Exists";
             }
        }
         catch (Exception $exp)
        {
            $msg="Try Again";
        }
    }
}

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ak Pic Share</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
<link href="jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/logo.png" type="image/png">
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>-->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>-->
<script type="text/javascript" src="scripts/ajax.js"></script>
<script type="text/javascript" src="scripts/ajax2.js"></script>
<script src="scripts/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="scripts/jquery.mousewheel.min.js" type="text/javascript"></script>
<script type="text/javascript" src="scripts/pop-ups.js"></script>
<script type="text/javascript" src="scripts/nav.js"></script>
<script type="text/javascript" src="js/validations.js"></script>  
</head>
<body>
<hgroup>
 <h1>Pic Share</h1>
  <h4>Ak Project</h4>
</hgroup>
<nav>
  <ul id="menu" class="menu">
    <li > <a href="#" id="login"> <img src="images/log.jpg" alt=""/> <span class="active"></span> <span class="wrap"> <span class="link">Login</span> <span class="descr">Enter to Pic Share</span> </span> </a> </li> 
     <li > <a href="#" id="register"> <img src="images/register.jpg" alt=""/> <span class="active"></span> <span class="wrap"> <span class="link">Signup</span> <span class="descr">Be a Part</span> </span> </a> </li> 
    <li> <a href="#" id="projects"> <img src="images/pro.jpg" alt=""/> <span class="active"></span> <span class="wrap"> <span class="link">Projects</span> <span class="descr">My work</span> </span> </a> </li>
    <li> <a href="#" id="contact"> <img src="images/contact.jpg" alt=""/> <span class="active"></span> <span class="wrap"> <span class="link">Contact</span> <span class="descr">Get in touch</span> </span> </a> </li>
     <li> <a href="#" id="about"> <img src="images/me.jpg" alt=""/> <span class="active"></span> <span class="wrap"> <span class="link">About me</span> <span class="descr">Know me</span> </span> </a> </li>
  </ul>
</nav>
<section id="bg">
  <section id="overlay"></section>
  <a href="#" class="nextImageBtn" title="next"></a><a href="#" class="prevImageBtn" title="previous"></a><img src="images/gallery/1.jpg" alt="Hills" id="bgimg" /></section>
<div id="preloader"><img src="images/ajax-loader_dark.gif" width="32" height="32" alt="" /></div>
<div id="img_title"></div>
<div id="toolbar"><a href="#" title="Maximize" onClick="ImageViewMode('full');return false"><img src="images/toolbar_fs_icon.png" width="50" height="50" alt="" /></a></div>
<div id="thumbnails_wrapper">
  <div id="outer_container">
    <div class="thumbScroller">
      <div class="container">
        <div class="content">
          <div><a href="images/gallery/1.jpg"><img src="images/gallery/thumbs/1.jpg" title="Hills" alt="Hills" class="thumb" /></a></div>
        </div>
        <div class="content">
          <div><a href="images/gallery/2.jpg"><img src="images/gallery/thumbs/2.jpg" title="Island" alt="Island" class="thumb" /></a></div>
        </div>
        <div class="content">
          <div><a href="images/gallery/3.jpg"><img src="images/gallery/thumbs/3.jpg" title="Galaxy" alt="Galaxy" class="thumb" /></a></div>
        </div>
        <div class="content">
          <div><a href="images/gallery/4.jpg"><img src="images/gallery/thumbs/4.jpg" title="Grass" alt="Grass" class="thumb" /></a></div>
        </div>
        <div class="content">
          <div><a href="images/gallery/5.jpg"><img src="images/gallery/thumbs/5.jpg" title="Long Distance" alt="Long Distance" class="thumb" /></a></div>
        </div>
        <div class="content">
          <div><a href="images/gallery/6.jpg"><img src="images/gallery/thumbs/6.jpg" title="Beach" alt="Beach" class="thumb" /></a></div>
        </div>
        <div class="content">
          <div><a href="images/gallery/7.jpg"><img src="images/gallery/thumbs/7.jpg" title="Sir Steve Jobs" alt="Sir Steve Jobs" class="thumb" /></a></div>
        </div>
        <div class="content">
          <div><a href="images/gallery/8.jpg"><img src="images/gallery/thumbs/8.jpg" title="Home" alt="Home" class="thumb" /></a></div>
        </div>
        <div class="content">
          <div><a href="images/gallery/9.jpg"><img src="images/gallery/thumbs/9.jpg" title="BMW" alt="BMW" class="thumb" /></a></div>
        </div>
        <div class="content">
          <div><a href="images/gallery/10.jpg"><img src="images/gallery/thumbs/10.jpg" title="Ak Hawk" alt="Ak Hawk" class="thumb" /></a></div>
        </div>
        <div class="content">
          <div><a href="images/gallery/11.jpg"><img src="images/gallery/thumbs/11.jpg" title="University" alt="University" class="thumb" /></a></div>
        </div>
        <div class="content">
          <div><a href="images/gallery/12.jpg"><img src="images/gallery/thumbs/12.jpg" title="Galaxy" alt="Galaxy" class="thumb" /></a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<article id="popupAbout" class="popupAbout">
  <div class="customScrollBox">
    <div class="container">
      <div class="content"> <a id="popupAboutClose"><img src="images/cross.png" width="20" alt="" /></a>
          <h1>About: Avi Kathuria</h1>
        <p><img src="images/avi.jpg" alt="" class="image"/>
            <br> <br> <br> <br><br><br><br> <br>~ A Student persuing B.tech in <strong>Computer Science & Engineering</strong> from <strong>Chandigarh Group of Colleges</strong>.</br>
                ~ Living in <strong>Chandigarh</strong> by birth and completed school from here only.<br>
              ~ Learned Php in 6 weeks training and completed this project by own with help of friends and teachers.
        </p>
      </div>
    </div>
    <div class="dragger_container">
      <div class="dragger"></div>
    </div>
    <a class="scrollUpBtn" href="#"></a> <a class="scrollDownBtn" href="#"></a> </div>
</article>
<article id="popupProjects" class="popupProjects">
  <div class="customScrollBox">
    <div class="container">
      <div class="content"> <a id="popupProjectsClose"><img src="images/cross.png" width="20" alt="" /></a>
       <h1>Project: Pic Share</h1>
        <h2>Inspired from CS Infotech</h2>
        <p class="nomargin"><img src="images/cs.jpg" alt="" class="image"/> Pic Share project based on php developed by me and learned php from <strong>Sir Chotu Sharma</strong> and friends within 6 weeks training.<br/>
        </p>
        <div class="border"></div>
        <h2>About Picshare</h2>
        <p class="nomargin"><img src="images/Camera.png" alt="" class="image"/> <strong>PicShare</strong> is a new online picture slideshow maker that lets you create professional looking picture sideshows in no time. All you have to do is upload images, customize them using provided templates and then share with others. With PicShare it's easier than ever to add photos, create elegant photo slideshows and share them with your friends and family. It has stylish customizable templates. It's intuitive and easy to use.<br/>
        </p>
        <div class="border"></div>
      </div>
    </div>
    <div class="dragger_container">
      <div class="dragger"></div>
    </div>
    <a class="scrollUpBtn" href="#"></a> <a class="scrollDownBtn" href="#"></a> </div>
</article>
<article id="popupContact" class="popupContact">
  <div class="customScrollBox">
    <div class="container">
      <div class="content"> <a id="popupContactClose"><img src="images/cross.png" width="20" alt="" /></a>
         <h1>Contact: Avi Kathuria</h1>
        <p></p>
        <form method="post">
             <img src="images/gm.png" alt="Gmail" />
            <br><label for="name">Gmail:</label>
            <br><label for="email">kathuria.avi@gmail.com</label>
            
            <br><br><img src="images/drop.jpg" alt="DropBox" />
            <br><label for="name">Dropbox:</label>     
            <br><label for="email">kathuria.avi@gmail.com</label>
           
          <br><br><img src="images/facebook.png" alt="Facebook" />
          <br><label for="name">Facebook:</label> 
          <br><label for="email">www.facebook.com/avikathuria</label>
        
          <br><br><img src="images/linkedin.png" alt="Linkedin" /> 
          <br><label for="name">Linked In:</label>  
          <br><label for="email">in.linkedin.com/pub/avi-kathuria/63/227/6b2</label>
          
          <br><br><img src="images/codecad.png" alt="Codecademy" height="40px" width="80px"/> 
          <br><label for="name">Codecademy:</label>  
          <br><label for="email">www.codecademy.com/kathuria</label>
          <br><br>
        </form>
        <br/>
      <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" class="map" src="https://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=30.755408,76.677361&amp;spn=0.167286,0.338173&amp;t=h&amp;z=12&amp;output=embed"></iframe><br />
        <div id="social-network">
            <a href="https://www.facebook.com/avikathuria" target="_blank"><img src="images/facebook.png" alt="Facebook" />
            <a href="http://in.linkedin.com/pub/avi-kathuria/63/227/6b2" target="_blank"><img src="images/linkedin.png" alt="Linkedin" />
            <a href="https://www.dropbox.com" target="_blank"><img src="images/drop.jpg" alt="DropBox" />
            <a href="http://www.gmail.com" target="_blank"><img src="images/gm.png" alt="Gmail" />
            <a href="http://www.codecademy.com/kathuria" target="_blank"><img src="images/codecademy.png" alt="Codecademy" height="42px" width="42px"/>
      </div>
    </div>
        </div>
    <div class="dragger_container">
      <div class="dragger"></div>
    </div>
    <a class="scrollUpBtn" href="#"></a> <a class="scrollDownBtn" href="#"></a> </div>
</article>

<article id="popuplog" class="popuplog">
    <div class="container">
      <div class="content"> <a id="popuplogClose"><img src="images/cross.png" width="20" alt="" /></a>
        <h1>Login</h1>
        <br><br>
 <p class="nomargin"><img src="images/Login.jpg" width="400" height="200" alt="" class="image"/>        
        <form name="f1" method="POST" action="index.php">
<table width="100%" align="centre">    
    <tr>
        <td width="130px">Email</td>
        <td>
            <input type="email" id="email" name="txtleml" required placeholder="email@example.com"/>
        </td>
    </tr>
    <tr>
        <td width="130px">Password</td>
        <td>
            <input type="password" name="txtlpwd" required placeholder="Password"/>
        </td>
    </tr>
    
    <tr>
        <td></td>
        <td colspan="2" size="4">
            <input type="submit" name="btnsub" value="Login"/> 
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href="frmfrgpwd.php" style="color:white">
                Forget Password
            </a>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <?php
            if(isset($msgerr))
                echo "<script>alert('$msgerr')</script>";
            ?>
        </td>
    </tr>
</table>
</form>
  <div class="border"></div>      
    </div>
        <p>
     
            <a href="admin/signin.php" title="Admin Login">
                <img src="images/administrator.png"  alt="" id="adlog" align="middle"/>
                
            </a>
 </p>
    </div>    
    <div class="dragger_container">
      <div class="dragger"></div>
    </div>
</article>

<article id="popupBlog" class="popupBlog">
  <div class="customScrollBox">
    <div class="container">
      <div class="content"> <a id="popupBlogClose"><img src="images/cross.png" width="20" alt="" /></a>
          <h1>Registration</h1>
        <br>
         <p class="nomargin"><img src="images/Signup.jpg" width="400" height="361" alt="" class="image"/>   
      
<form name="f2" onSubmit="return formValidation();" action="#" method="POST" >   
<table width="500" align="center" >
    <tr>
        <td width="130px">Name</td>
        <td>
            <input type="text" name="txtnam" required placeholder="Name"/>
        </td>
    </tr>
    <tr>
        <td width="130px">Email</td>
        <td>
            <input type="email" id="email" name="txteml" required placeholder="email@example.com"/>
        </td>
    </tr>
    <tr>
        <td width="130px">Password</td>
        <td>
            <input type="password" name="txtpwd" required placeholder="Password"/>
        </td>
    </tr>
    <tr>
        <td width="130px">Confirm Password</td>
        <td>
            <input type="password" name="txtconpwd" required placeholder="Re-Type Password"/>
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2">
            <input type="submit" name="btnsub2" value="Submit" /> 
            <input type="reset" name="reset" value="Reset" />
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <?php
            if(isset($msg))
            {
                echo $msg;
                echo "<script>alert('$msg')</script>";
            }
            ?>
        </td>
    </tr>
</table>
    </form>
      </p>
</div>
        <div class="border"></div>
      </div>
    </div>
    <div class="dragger_container">
      <div class="dragger"></div>
    </div>
    <a class="scrollUpBtn" href="#"></a> <a class="scrollDownBtn" href="#"></a> </div>
</article>


<script type="text/javascript" src="scripts/gallery.js"></script> 
<script type="text/javascript" src="scripts/jquery.mCustomScrollbar.js"></script>
</body>
</html>