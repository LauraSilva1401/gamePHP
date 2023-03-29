$(document).ready(function(){
console.log("entro a history/stop");

	$("#Stop").click( function(event) { 
        event.preventDefault();     
        $.post("controllers/history.php",{type:1},function(res){
            console.log("***"+res+"***");
            if(res == true){
                window.location.href = "index.php?pagina=login"; 
            }  
            
        })        
    });

    //crea tu funcion de click, tu type a enviar es 2
});