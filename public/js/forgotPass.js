$(document).ready(function(){

    console.log("Entre JavaScript ResetP")

	$("#reset").click( function(event) {    
        event.preventDefault();                             
        var email = $("#email").val();
        var password = $("#password").val();
        var password2 = $("#password2").val();
   


        $.post("controllers/forgotPass.php",{Email: email, Password: password,Password2: password2},function(res){
            console.log("***"+res+"***");
            if(res == true){
            	console.log("entro si");
            	$("#PositiveAlert").show();
                if ( !$( '#PositiveAlert' ).hasClass( 'yes' ) ){
                    $( '#PositiveAlert' ).addClass( "yes" );
                }
               // alert("Password updated succesfully!");
                setTimeout(function(){
                        window.location.href = "index.php?pagina=login";  
                    }, 4000);
                
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
    	
        
        if($("#email").val() == "" || ans === "Error, email lenght must be between 15 and 30" || ans === "Error, write a correct email!"){
		    
        $("#email").focus();
		
        }else{
		        	
            
            if($("#password").val() == "" || ans === "Error, password lenght must be between 6 and 12"){
			        
                $("#password").focus(); 
			    
            }else{
			        	
                if($("#password2").val() == "" || ans === "Error, passwords doesnt match!"){
				        	
                    $("#password2").focus()
				    
                }
			}
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