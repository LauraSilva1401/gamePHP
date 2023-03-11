$(document).ready(function(){
	console.log("si entro al login");

	$("#submit").click( function(event) {    
        event.preventDefault();                             
        var email = $("#email").val();
        var password = $("#password").val();
      

        $.post("controllers/login.php",{Email: email, Password: password},function(res){
            console.log("***"+res+"***");
            if(res == true){
            	console.log("entro si");
               //window.location.href = "devices.php";   
            }else{
                console.log("entro no");
            } 
            
            //$("#fracaso").delay(500).fadeIn("slow"); 
             
        })  
    });

});