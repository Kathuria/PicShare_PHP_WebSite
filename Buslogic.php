<?php
include_once 'connect.php';

class clspsreg           //class tablename
{
    function __construct() 
    {
        $obj=new clscon;        //when $obj is called then obj goes to clscon constructor which leads to its class then connection get established
    }
    

    public $regcod,$regnam,$regeml,$regpwd,$regdat,$picnam, $picrpt,$regsug;
    
    function frgpwd($eml)
    {
        $qry="call frgpwd('$eml',@pwd)";
        $res= mysql_query($qry);
        $res1= mysql_query("select @pwd");
        $r=  mysql_fetch_array($res1);      //Check this
        return $r[0];
    }
    
    
    
    function Save_Rec()     //Record
    {
        //$obj=new clscon();      
        $qry="Call insreg('$this->regnam','$this->regeml','$this->regpwd','$this->regdat')";
        $res= mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
            return TRUE;
        else 
           return FALSE; 
    }
    
    function Save_Rep()     //Record
    { 
        $qry="Call insrep('$this->regnam','$this->picnam','$this->regdat','$this->picrpt')";
        $res= mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
            return TRUE;
        else 
           return FALSE; 
    }
    
     function Save_Sug()     //Record
    { 
        $qry="Call inssug('$this->regsug','$this->regdat')";
        $res= mysql_query($qry) or die(mysql_error());
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
            return TRUE;
        else 
           return FALSE; 
    }
    
    function Update_Rec()
    {
        //$obj=new clscon();      //when  rec method call then obj goes to clscon constructor which leads to its class then connection get established
        $qry="Call updreg('$this->regcod','$this->regnam','$this->regeml','$this->regpwd','$this->regdat')";
        $res=  mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
            return TRUE;
        else 
           return FALSE; 
    }
    
    function Delete_Rec($regcod)
    {
        //$obj=new clscon();      
        $qry="Call delreg('$regcod')";
        $res= mysql_query($qry);
        $d= mysql_affected_rows();
        mysql_close();
        if($d==1)
            return TRUE;
        else 
           return FALSE; 
    }
    
     function Disp_Rec()
    {
        //$obj=new clscon();      
        $qry="Call dispreg()";
        $res= mysql_query($qry);
        $objarr=array();
        $i=0;
        while($r= mysql_fetch_row($objarr))
        {
            $objarr[$i]=$r[$i];
            $i++;
        }
       mysql_close();
            return $objarr;
    }

     function Find_Rec($regcod)
    {
        //$obj=new clscon();      
        $qry="Call findreg('$regcod')";
        $res= mysql_query($qry);
        if(mysql_num_rows($res)>0)
        {
            $r= mysql_fetch_row($res);
            
            $this->regcod=$r[0];
            $this->regnam=$r[1];
            $this->regeml=$r[2];
            $this->regpwd=$r[3];
            $this->regdat=$r[4];
        }
        mysql_close();
    }
    
    function logincheck()
    {
      //$obj=new clscon();
      
      $qry="Call logincheck('$this->regeml','$this->regpwd',@cod)";
      $res=mysql_query($qry)or die(mysql_error());
      $res1= mysql_query("select @cod");  
      $r=  mysql_fetch_row($res1);
      $a=$r[0];
      return $a;        //If -1 reurned then incorrect
      
    }
    
     function admincheck()
    {
      //$obj=new clscon();
      
      $qry="Call admincheck('$this->regeml','$this->regpwd',@cod)";
      $res=mysql_query($qry)or die(mysql_error());
      $res1= mysql_query("select @cod");  
      $r=  mysql_fetch_row($res1);
      $a=$r[0];
      return $a;        //If -1 reurned then incorrect
      
    }
    
}


class clspsalb           //class tablename
{
    public $albcod,$albtit,$albdsc,$albdat,$albregcod,$albcvrpiccod;
    function __construct() 
    {
         $obj=new clscon();     
     }
    
    function Save_Rec()     //Record
    {
        //$obj=new clscon();      //when Save rec method call then obj goes to clscon constructor which leads to its class then connection get established
        $qry="Call insalb('$this->albtit','$this->albdsc','$this->albdat','$this->albregcod','$this->albcvrpiccod')";
        $res= mysql_query($qry) or die(mysql_error());
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
            return TRUE;
        else 
           return FALSE; 
    }
    
    function Update_Rec()
    {
        //$obj=new clscon();      
        $qry="Call updalb('$this->albcod','$this->albtit','$this->albdsc')";
        $res=  mysql_query($qry)  or die(mysql_error());
        mysql_close();
        if(mysql_affected_rows()==1)
            return TRUE;
        else 
           return FALSE; 
    }
    
      function UpdatecvrPic()
    {
        //$obj=new clscon();      
        $qry="Call updcvrpic('$this->albcod','$this->albcvrpiccod')";
        $res=  mysql_query($qry) or die(mysql_error());
        if(mysql_affected_rows()==1)
            return TRUE;
        else
        return FALSE;
    } 
    
    function Delete_Rec($albcod)
    {
       // $obj=new clscon();      
        $qry="Call delalb('$albcod')";
        $res= mysql_query($qry) or die(mysql_error());
        $d= mysql_affected_rows();
        mysql_close();
        if($d==1)
            return TRUE;
        else 
           return FALSE; 
    }
    
     function Disp_Rec($regcod)
    {
        //$obj=new clscon();     
        $qry="call dspmyalb('$regcod')";
        $res=  mysql_query($qry) or die(mysql_error());  
        $arr=array();
        $i=0; 
        while ($r= mysql_fetch_row($res))
        {
            $arr[$i++]=$r;
        }
        mysql_close();
        return $arr;
    }
    
    function DispShrAlb($regcod)
    {
        //$obj=new clscon();      
        $qry="Call dspshralb('$regcod')";
        $res=  mysql_query($qry) or die(mysql_error());  
        $arr=array();
        $i=0; 
        while ($r= mysql_fetch_row($res))
        {
            $arr[$i++]=$r;
        }
        return $arr;
    }

     function Disp_ARec()
    {
        //$obj=new clscon();     
        $qry="call dispalb()";
        $res=  mysql_query($qry) or die(mysql_error());  
        $arr=array();
        $i=0; 
        while ($r= mysql_fetch_row($res))
        {
            $arr[$i++]=$r;
        }
        mysql_close();
        return $arr;
    }
    
     function Find_Rec($albcod)
    {
       // $obj=new clscon();      
        $qry="Call findalb('$albcod')";
        $res= mysql_query($qry) or die(mysql_error());
        if(mysql_num_rows($res)>0)
        {
            $r= mysql_fetch_row($res);
            
            $this->albcod=$r[0];
            $this->albtit=$r[1];
            $this->albdsc=$r[2];
            $this->albdat=$r[3];
            $this->albregcod=$r[4];
            $this->albcvrpiccod=$r[5];
        }
        mysql_close();
       
    }
}


class clspsalbpic           //class tablename
{
    public $albpiccod,$albpicalbcod,$albpicfil,$albpicdsc;
   function __construct() 
        {
           $obj=new clscon();
       }
    function Save_Rec()     //Record
    {
        //$obj=new clscon();      
        $qry="Call insalbpic('$this->albpicalbcod','$this->albpicfil','$this->albpicdsc',@apcod)";   //out parameter is passed @apcod
                                                        //Here last_insert_id is used to retreive auto increment value of apcod
        mysql_query($qry)or die(mysql_error());
        $res1= mysql_query("select @apcod") ;
        $r=  mysql_fetch_row($res1);
        return $r[0];
        
    }
    
    function Update_Rec()
    {
        //$obj=new clscon();      
        $qry="Call updalbpic('$this->albpiccod','$this->albpicalbcod','$this->albpicfil','$this->albpicdsc')";
        $res=  mysql_query($qry) or die(mysql_error());
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
            return TRUE;
        else 
           return FALSE; 
    }
    
    function Delete_Rec($albpiccod)
    {
        //$obj=new clscon();      
        $qry="Call delalbpic('$albpiccod')";
        $res= mysql_query($qry) or die(mysql_error());
        $d= mysql_affected_rows();
        mysql_close();
        if($d==1)
            return TRUE;
        else 
           return FALSE; 
    }
    
     function Disp_Rec($acod)
    {
        //$obj=new clscon();      
        $qry="Call dispalbpic('$acod')";
        $res= mysql_query($qry) or die(mysql_error());
        $objarr=array();
        $i=0;
        while($r= mysql_fetch_row($res))
        {
            $objarr[$i]=$r;
            $i++;
        }
        mysql_close();
            return $objarr;
    }

     function Find_Rec($albpiccod)
    {
        //$obj=new clscon();      
        $qry="Call findalbpic('$albpiccod')";
        $res= mysql_query($qry) or die(mysql_error());
        if(mysql_num_rows($res)>0)
        {
             $r= mysql_fetch_array($res);
             
            $this->albpiccod=$r[0];
            $this->albpicalbcod=$r[1];
            $this->albpicfil=$r[2];
            $this->albpicdsc=$r[3];
        }
        mysql_close();
    }
}


class clspsshr           //class tablename
{
    public $shrcod,$shrregcod,$shralbcod;
    function __construct() 
    {
           $obj=new clscon();    
    }
    
    function Save_Rec()     //Record
    {
        //$obj=new clscon();     
        $qry="Call insshr('$this->shrregcod','$this->shralbcod')";
        $res= mysql_query($qry) or die(mysql_error());
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
            return TRUE;
        else 
           return FALSE; 
    }
    
    function Update_Rec()
    {
        //$obj=new clscon();      
        $qry="Call updshr('$this->shrcod','$this->shrregcod','$this->shralbcod')";
        $res=  mysql_query($qry) or die(mysql_error());
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
            return TRUE;
        else 
           return FALSE; 
    }
    
    function Delete_Rec($shrcod)
    {
        //$obj=new clscon();      
        $qry="Call delshr('$shrcod')";
        $res= mysql_query($qry) or die(mysql_error());
        $d= mysql_affected_rows();
        mysql_close();
        if($d==1)
            return TRUE;
        else 
           return FALSE; 
    }
    
     
 function DispAlbShr($albcod)
    {
        //$obj=new clscon();      
        $qry="call dispalbshr('$albcod')";
        $res=  mysql_query($qry) or die(mysql_error());  
        $arr=array();
        $i=0; 
        while ($r= mysql_fetch_row($res))
        {
            $arr[$i++]=$r;
        }
        return $arr;
    }
    
     function Find_Rec($shrcod)
    {
        //$obj=new clscon();      
        $qry="Call findshr('$shrcod')";
        $res= mysql_query($qry)  or die(mysql_error());
         if(mysql_num_rows($res)>0)
        {  
            $r=  mysql_fetch_array($res) ;
            
            $this->shrcod=$r[0];
            $this->shrregcod=$r[1];
            $this->shralbcod=$r[2];
        }
        mysql_close();
    }
}


class clspscmt           //class tablename
{
    public $cmtcod,$cmtdat,$cmtregcod,$cmtdsc,$cmtalbpiccod;
    function __construct() 
    {
        $obj=new clscon();
    }
    
    function Save_Rec()     //Record
    {
        //$obj=new clscon();      
        $qry="Call inscmt('$this->cmtdat','$this->cmtregcod','$this->cmtdsc','$this->cmtalbpiccod')";
        $res= mysql_query($qry)  or die(mysql_error());
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
            return TRUE;
        else 
           return FALSE; 
    }
    
    function Update_Rec()
    {
        //$obj=new clscon();      
        $qry="Call updcmt('$this->cmtcod,'$this->cmtdat','$this->cmtregcod','$this->cmtdsc','$this->cmtalbpiccod')";
        $res=  mysql_query($qry);
        $d=  mysql_affected_rows();
        mysql_close();
        if($d==1)
            return TRUE;
        else 
           return FALSE; 
    }
    
    function Delete_Rec($cmtcod)
    {
        //$obj=new clscon();      
        $qry="Call delcmt('$cmtcod')";
        $res= mysql_query($qry);
        $d= mysql_affected_rows();
        mysql_close();
        if($d==1)
            return TRUE;
        else 
           return FALSE; 
    }
    
     function DispPicCmt($piccod)
    {
       //$obj=new clscon();      
        $qry="Call disppiccmt('$piccod')";
        $res= mysql_query($qry) or die(mysql_error());
        $str="";
        
       $r= mysql_fetch_row($res);
        {
            $str.="Comment By: ".$r[1]."<br>";
            $str.=$r[2];    //All comments displayed in strings
                    
        }
        mysql_close();
        return $str;
    }

     function Find_Rec($cmtcod)
    {
        //$obj=new clscon();      
        $qry="Call findcmt('$cmtcod')";
        $res= mysql_query($qry);
         if(mysql_num_rows($res)>0)
        {
            $r=  mysql_fetch_array($res);
            
            $this->cmtcod=$r[0];
            $this->cmtdat=$r[1];
            $this->cmtregcod=$r[2];
            $this->cmtdsc=$r[3];
            $this->cmtalbpiccod=$r[4];
        }
        mysql_close();
    }
}

?>
