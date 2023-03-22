
var btn = document.getElementsByClassName('btnRech');
var par = document.getElementByClassName('rechTicket');

btn.addEventListener("click", 
function () { afficher();});

function afficher(){
    var rechGlob = document.getElementByClassName('rechGlob');
    par.style.visibility = "hidden";
    rechGlob.style.visibility = "visible";

}
            
