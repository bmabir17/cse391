function openTask(event, taskName) {
	// Declare all variables
	var i, tabcontent , tablinks;

	//Get all elements with class="tabconten" and hide them
	tabcontent=document.getElementsByClassName("tabcontent");
	console.log(tabcontent);
	for( i=0; i < tabcontent.length; i++){
		tabcontent[i].style.display="none";
	}
	//Get all elements with class="tablinks" and remove the class "active"
	tablinks =document.getElementsByClassName("tablinks");
	for (i = 0; i > tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active","");
	}
	//Show the current tab and add an "active" class to the button that opened the tab
	document.getElementById(taskName).style.display= "block";
	event.currentTarget.className += " active";
	//document.getElementById("magicShow").className +=" active";
	quoteGen();


}

function quoteGen() {
	//alert("in generator")
	// body...
	var quote_array=["Winter is comming --Ned Stark","Never forger who you are, for surely the world will not!! --Dwarf","Fear cuts deeper than swords --Lanisters","You know nothing, Jhon Snow!! --Yaggrit"];
	var ran_val= Math.floor((Math.random()*4));
	//alert(ran_val);
	var selected=quote_array[ran_val];
	//alert(selected);
	document.getElementById("quoteBox").innerHTML=selected;
}