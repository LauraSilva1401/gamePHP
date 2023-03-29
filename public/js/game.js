$(document).ready(function(){
    getRamdomValue();
    var question = "";
	$("#submit").click( function(event) {    
        event.preventDefault();                             
        //var question = $("#question").val();
        var answer = $("#answer").val();
        
        $.post("controllers/game.php",{Real: question, Answer: answer,Type:2},function(res){
            console.log("***"+res+"***");
            if(res == true){
            	$("#PositiveAlert").show();
                if ( !$( '#PositiveAlert' ).hasClass( 'yes' ) ){
                    $( '#PositiveAlert' ).addClass( "yes" );
                }
               window.location.href = "index.php?pagina=game";   
            }else{
                var text = JSON.parse(res);
                var html = document.getElementById("NegativeAlert");
                 html.innerHTML = "<strong>"+text['ans']+"</strong>";
                 var html2 = document.getElementById("lives");
                 html2.innerHTML = "#Lives:<strong>"+text['lives']+"</strong>";
                $("#NegativeAlert").show();
                if ( !$( '#NegativeAlert' ).hasClass( 'yes' ) ){
                    $( '#NegativeAlert' ).addClass( "yes" );
                }
                validatedForm(text['ans']);
                if(text['lives']=="0"){
                    //window.location.href = "index.php?pagina=game"; 
                    setTimeout(function(){
                        window.location.href = "index.php?pagina=game"; 
                    }, 3000);
                }
            } 
        })  
    });

    function getRamdomValue(){
        $.post("controllers/game.php",{Type:1},function(res){
            //.log("###"+res+"###");
            question = res;
            $("#question").val(res);
        })
    }

    function validatedForm(ans){
    	if($("#answer").val() == "" || ans !== ""){
        	$("#answer").focus();
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
       }, 6000);
});