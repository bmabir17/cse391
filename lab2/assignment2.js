function footerColor(event,color) {
	// body...
	footerContent= document.getElementById("footer");
	//alert(color);
	footerContent.style.backgroundColor=color;
}
function convert() {
	// body...
	//alert("convert");
	val=document.getElementById("numInput").value;
	//alert(val);
	selectedType=document.getElementById("typeConv").value;
	//alert(selectedType);
	res=0;
	if(selectedType=="lb"){
		res=0.453592*val;
	}else if(selectedType=="kg"){
		res=2.2*val;
	}
	document.getElementById("convResult").innerHTML=res;

}
function sum_max_min() {
	// body...
	val=document.getElementById("seriesInput").value;
	//alert(val);
	val_arr=val.split(",").map(Number);
	//alert(val_arr[0]+val_arr[1]);

	sum = val_arr.reduce(get_sum,0);
	//alert(sum);
	document.getElementById("sumVal").innerHTML=sum;

	avg = sum/(val_arr.length);
	//alert(avg);
	document.getElementById("avgVal").innerHTML=avg;

	min = Math.min.apply(null, val_arr);
	//alert(min);
	document.getElementById("minVal").innerHTML=min;
	max = Math.max.apply(null, val_arr);
	//alert(max);
	document.getElementById("maxVal").innerHTML=max;
	reverse= val_arr.reverse();
	alert(reverse);
	document.getElementById("reverseVal").innerHTML=reverse;
}
function get_sum(total, currentVal) {
	// body...
	return total+currentVal;
}
displayArray = ["sample text","sample text","sample text","sample text","sample text","sample text"];
//list =document.createElement('ul');
/*
function magic_show() {
	// body...
	//alert("magic_show");
	
	//create list element
	document.getElementById("magicShow").style.display="initial";
	

	for (n in displayArray){
		//alert(displayArray[n]);
		//create list item
		var item = document.createElement('li');
		//set its contents:
		item.appendChild(document.createTextNode(displayArray[n]));
		// Add it to the list:
		list.appendChild(item);
	}
	document.getElementById("magicShow").appendChild(list);
	
}
*/
function magic_clear() {
	// body...
	document.getElementById("magicShow").style.display="none";
	//list.remove();

}
var capState=false;

function magic_cap() {
	// body...
	if (capState) {
		list=document.getElementById("magicList");
		items=list.getElementsByTagName("li");
		console.log(items);
		for(n=0;n<items.length;n++){
			temp=items[n].innerHTML;
			temp=temp.toLowerCase();
			items[n].innerHTML=temp;
			//alert(temp);
		}
		capState=false;
	}else{
		list=document.getElementById("magicList");
		items=list.getElementsByTagName("li");
		console.log(items);
		for(n=0;n<items.length;n++){
			temp=items[n].innerHTML;
			temp=temp.toUpperCase();
			items[n].innerHTML=temp;
			//alert(temp);
		}
		capState=true;
	}
	
}
function magic_reverse() {
	// body...

	list=document.getElementById("magicList");
	items=list.getElementsByTagName("li");
	console.log(items);
	itemsArr=[];
	for(n=0;n<items.length;n++){
		temp=items[n].innerHTML;
		console.log(n);
		itemsArr[n]=temp;

		//alert(temp);
	}
	console.log(itemsArr);
	itemsRev=itemsArr.reverse();
	console.log(itemsRev);
	for(n=0;n<items.length;n++){
		temp=itemsRev[n];
		items[n].innerHTML=temp;
		//alert(temp);
	}

}
function magic_add_num() {
	// body...
	list=document.getElementById("magicList");
	items=list.getElementsByTagName("li");
	console.log(items);
	for(n=0;n<items.length;n++){
		temp=items[n].innerHTML;
		temp=temp+n;
		items[n].innerHTML=temp;
		//alert(temp);
	}
}
function magic_strip() {
	// body...
	list=document.getElementById("magicList");
	items=list.getElementsByTagName("li");
	console.log(items);
	for(n=0;n<items.length;n++){
		temp=items[n].innerHTML;
		temp=temp.replace(/ /g,'');
		items[n].innerHTML=temp;
		//alert(temp);
	}
}
function magic_shuffle() {
	// body...

	list=document.getElementById("magicList");
	items=list.getElementsByTagName("li");
	console.log(items);
	itemsArr=[];
	for(n=0;n<items.length;n++){
		temp=items[n].innerHTML;
		console.log(n);
		itemsArr[n]=temp;

		//alert(temp);
	}
	console.log(itemsArr);
	itemsRev=shuffle_array(itemsArr);
	console.log(itemsRev);
	for(n=0;n<items.length;n++){
		temp=itemsRev[n];
		items[n].innerHTML=temp;
		//alert(temp);
	}

}
function shuffle_array( array ){
	var count = array.length,
     randomnumber,
     temp;
	 while( count ){
	  randomnumber = Math.random() * count-- | 0;
	  temp = array[count];
	  array[count] = array[randomnumber];
	  array[randomnumber] = temp;
	 }
	 return array;
}
function magic_sort() {
	// body...

	list=document.getElementById("magicList");
	items=list.getElementsByTagName("li");
	console.log(items);
	itemsArr=[];
	for(n=0;n<items.length;n++){
		temp=items[n].innerHTML;
		console.log(n);
		itemsArr[n]=temp;

		//alert(temp);
	}
	console.log(itemsArr);
	itemsRev=itemsArr.sort();
	console.log(itemsRev);
	for(n=0;n<items.length;n++){
		temp=itemsRev[n];
		items[n].innerHTML=temp;
		//alert(temp);
	}

}