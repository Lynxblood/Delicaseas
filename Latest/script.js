let btn = document.getElementById("dropdown");
		
	btn.style.maxHeight= "0px";
		
	function menutoggle(){
		if(btn.style.maxHeight == "0px"){
			btn.style.maxHeight = "900px";
		}
		else{
			btn.style.maxHeight = "0px";
		}
	}
	
function showValue(){

const radio = document.getElementsByName('pay');

for (i=0; i<radio.length; i++){
	if(radio[i].checked){
	//alert("You selected "+radio[i].value+" for Payment!");
		if(radio[i].value=="Gcash"){
			document.getElementsByClassName("number")[0].style.display = "block";
			document.getElementsByClassName("number")[0].placeholder ='Gcash Number';
		}
		else if(radio[i].value=="Card"){
			document.getElementsByClassName("number")[0].style.display = "block";
			document.getElementsByClassName("number")[0].placeholder ='Card Number';
		}
		else if(radio[i].value=="COD"){
			document.getElementsByClassName("number")[0].style.display = "none";
		}
	}
}
}

function payNow(){
	if(confirm("Do you want to proceed?")) {
		alert("Thank you for buying.");
	}
	else {
		alert("You canceled the payment.");
	}

}
