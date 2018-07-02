// JavaScript Document

//function to print 

function printContent(ele){
	var restorepage= document.body.innerHTML;
	var printcontent= document.getElementById(ele).innerHTML;
	document.body.innerHTML=printcontent;
	window.print() ;
	document.body.innerHTML=restorepage;
}