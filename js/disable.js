$(document).ready(function() {
    $(window).keyup(function(e){
      if(e.keyCode == 44 || e.keyCode == 91)    //44 for prntscr and 91 fr windows
      {
        $("body").hide();
        alert("Ohh!!! Seems you hit Print Screen Key /Win Key"); 
      }
$("body").show();
    });
    
});