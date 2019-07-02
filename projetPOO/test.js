var boursier=document.getElementById("bours");
var nonboursier=document.getElementById("nonbours");
var nonloge=document.getElementById("nonlog");
var loger=document.getElementById("loger");
var adresse=document.getElementById("adresse");
var numcham=document.getElementById("numcham");
var numbat=document.getElementById("numbat");
var lognonloge=document.getElementById("lonon");
var typebours=document.getElementById("tybourse");

adresse.style.display="block";
lognonloge.style.display="none";
numbat.style.display="none";
numcham.style.display="none";
typebours.style.display="none";

boursier.onchange=function(){
    adresse.style.display="none";
    lognonloge.style.display="block";
    typebours.style.display="block";

}

nonboursier.onchange=function(){
    adresse.style.display="block";
    numcham.style.display="none";
    numbat.style.display="none";
    typebours.style.display="none";
   lognonloge.style.display="none";
    
}
nonloge.onchange=function(){
    numcham.style.display="none";
    numbat.style.display="none";
    typebours.style.display="block";

}

loger.onchange=function(){
    numcham.style.display="block";
    numbat.style.display="block";
    typebours.style.display="block";
  
}

