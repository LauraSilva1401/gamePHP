$(document).ready(function(){
console.log("entro a history/stop");
var url = window.location.href;


url = url.split("=");





if (url[1] == "history")
{
    console.log("si entro hstory");
    getTable();
}

function getTable(){

    $.post("controllers/history.php",{type:2},function(res){
        console.log("***"+res+"***");
       
        var html = document.getElementById("historyTable");
        html.innerHTML = res;
        
    })   



}


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