var myVar;
var myVar1;
function myFunction() {
    myVar = setTimeout(showPage, 500);
}

function showPage() {
    document.getElementById("loader").style.display = "none";
    document.querySelector("myPage").style.display = "block";
}

function myFunction1() {
    myVar1 = setTimeout(showPage1, 500);
}

function showPage1() {
    document.getElementById("loader").style.display = "none";
    document.querySelector("myPage").style.display = "block";
}