// JavaScript Document
function formValidation()  
{  

        var uname = document.f2.txtnam;  
	var uemail = document.f2.txteml;
	var pwd = document.f2.txtpwd;  
	var cpwd = document.f2.txtconpwd;
       
        if(allLetter(uname))  
        {  
            if(ValidateEmail(uemail))  
            {   
                if(pwd_validation(pwd,5,18))  
                {  
                    if(alpha(pwd))
                    { 
                       if(check(pwd,cpwd))
                       {
                           return true;
                       }
                    }
		}  
            }  
	}  
            
return false; 
} 

function pwd_validation(pwd,low,high)  
{  
	var pwd_len = pwd.value.length; 
	 
	if (pwd_len == 0 || pwd_len <= low || pwd_len > high )  
	{  
		alert("Password length must be in between "+low+" to "+high);  	
		pwd.focus();  
		return false;  
	}  
	
return true;  
}

function alpha(pwd)
{
    var letters = /^[0-9a-zA-Z]+$/; 
    if(pwd.value.match(letters))
        return true;
    else
        {
            alert("Password should be alphanumeric");
            pwd.focus();
            return false;
        }
}

function check(pwd,cpwd)
{
    if(pwd.value!=cpwd.value) 
        {
            alert("Password & Confirm Password doesn't match"); 
            return false;
        }
        
    return true;                         
}

function allLetter(uname)  
{   
	var letters = /^[A-Za-z]+$/;  
	if(uname.value.match(letters))  
	{  
		return true;  
	}  
	else  
	{  
		alert('Username must have alphabet characters only');  
		uname.focus();  
		return false;  
	}  
}  


function ValidateEmail(uemail)  
{  
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
	if(uemail.value.match(mailformat))  
	{  
		return true;  
	}  
	else  
	{  
		alert("You have entered an invalid email address!");  
		uemail.focus();  
		return false;  
	}  
}
