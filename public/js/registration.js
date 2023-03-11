$(document).ready(function(){

	console.log("entro a registration");

	$("#submit").click( function(event) {    
        event.preventDefault();                             
        var email = $("#email").val();
        var password = $("#password").val();
        var password2 = $("#password2").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();

        $.post("controllers/registration.php",{Email: email, Password: password,Password2: password2, Fname:fname, Lname:lname},function(res){
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