$(document).ready(function(){
console.log("entro a logout");
	$("#LogOut").click( function(event) { 
        var button = $("#LogOut").val();
        
        if(button==="Log in"){
            event.preventDefault(); 
            window.location.href = "index.php?pagina=login"; 
        }else{
            event.preventDefault();     
            $.post("controllers/logOut.php",{},function(res){
                console.log("***"+res+"***");
                //window.location.href = "index.php?pagina=login";   
                
            })
        }          
    });
});