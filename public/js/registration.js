$(document).ready(function(){
	console.log("entro a registration");
	$("#submit").click( function(event) {    
        event.preventDefault();                             
        var email = $("#email").val();
        var password = $("#password").val();
        var fname = $("#email").val();
        var lname = $("#lname").val();

        $.post("controllers/registration.php",{Email: email, Password: password, Fname:fname, Lname:lname},function(res){
            console.log("***"+res+"***");
            if(res == true){
            	console.log("entro si");
               //window.location.href = "devices.php";   
            } 
            
            //$("#fracaso").delay(500).fadeIn("slow"); 
            console.log("entro no"); 
        })  
    });
});