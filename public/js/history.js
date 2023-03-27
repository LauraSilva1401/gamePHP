$(document).ready(function(){
console.log("entro a history/stop");
	$("#Stop").click( function(event) { 
        event.preventDefault();     
        $.post("controllers/history.php",{},function(res){
            console.log("***"+res+"***");
            if(res == true){
                window.location.href = "index.php?pagina=login"; 
            }  
            
        })        
    });
});