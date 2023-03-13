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
                validatedLoginForm(res);
            } 
            
            //$("#fracaso").delay(500).fadeIn("slow"); 
             
        })  
    });

    function validatedLoginForm(ans){

        if($("#email").val() == "" || ans === "Error, email length must be between 15 and 30"){
            $("#email").focus();
        }
        if($("#password").val() == "" || ans === "Error, password length must be between 6 and 12"){
            $("#password").focus(); 
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