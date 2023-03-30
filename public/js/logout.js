$(document).ready(function(){
console.log("entro a logout");
	$("#LogOut").click( function(event) { 
        var button = $("#LogOut").val();
        
        
        if(button==="Log in"){
            event.preventDefault(); 
            window.location.href = "index.php?pagina=login"; 
        }else{
            event.preventDefault();
            $.post("controllers/history.php",{type:1},function(res){
                if(res == true){
                    $.post("controllers/logOut.php",{},function(res2){

                        console.log("***"+res2+"***");
                        window.location.href = "index.php?pagina=login";   
                        
                    })
                }
            }) 
        }          
    });
});