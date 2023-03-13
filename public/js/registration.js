$(document).ready(function(){

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
            	$("#PositiveAlert").show();
                if ( !$( '#PositiveAlert' ).hasClass( 'yes' ) ){
                    $( '#PositiveAlert' ).addClass( "yes" );
                }
               //window.location.href = "devices.php";   
            }else{
                console.log("entro no");
                //$("#NegativeAlert").delay(500).fadeIn("slow"); 
                var html = document.getElementById("NegativeAlert");
                 html.innerHTML = "<strong>"+res+"</strong>";
                $("#NegativeAlert").show();
                if ( !$( '#NegativeAlert' ).hasClass( 'yes' ) ){
                    $( '#NegativeAlert' ).addClass( "yes" );
                }
                validatedForm(res);
            } 
        })  
    });

    function validatedForm(ans){
    	
        if($("#fname").val() == "" || ans === "Error, firstName must be letter a-z and lenght between 4 and 17"){
            $("#fname").focus();
        }
        if($("#lname").val() == "" || ans === "Error, lastName must be letter a-z and lenght between 4 and 17"){
            $("#lname").focus();
        }
        if($("#email").val() == "" || ans === "Error, email lenght must be between 15 and 30"){
            $("#email").focus();
        }
        if($("#password").val() == "" || ans === "Error, password lenght must be between 6 and 12"){
            $("#password").focus(); 
        }
        if($("#password2").val() == "" || ans === "Error, passwords doesnt match!"){
        	console.log("entro aca");
            $("#password2").focus()
        }
    }

    setInterval(function () {
          // and at here you can check whether the html coming is success or error
          if ( $( '#NegativeAlert' ).hasClass( 'yes' ) ){
            $( '#NegativeAlert' ).removeClass( "yes" );
            $( '#NegativeAlert' ).hide();
          }
          if ( $( '#PositiveAlert' ).hasClass( 'yes' ) ){
            $( '#PositiveAlert' ).removeClass( "yes" );
            $( '#PositiveAlert' ).hide();
          }
       }, 5000);
});