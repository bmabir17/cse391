window.onload = function () {
	var dateMod= document.lastModified;
	//alert(dateMod);
	dateMod="Last modified on: "+dateMod;
	var elemShowdate= document.getElementById('showModDate');
	elemShowdate.innerHTML=dateMod;
}