 
	//recojemos los elementos que contengan la clase que nos indica que son bundles
	let arraySales=document.getElementsByClassName("product-type-woosb");
	//recorremos cacda uno de los bundles
	for(let i = 0; i<arraySales.length; i++){
		//comprobamos que forman parte de la tablade productos del grupo
		if(arraySales[i].querySelector("td")){
		//modificamos el contador para insertar un mensaje que diga SALE
    	arraySales[i].firstChild.innerHTML="<b>SALE</b>";
		//recojemos la etiqueta del precio
    	let forOnly = arraySales[i].lastChild;
    	let forOnlyNodes = forOnly.childNodes;
		//modificamos el precio para insertar un mensaje que indique mejor que es una rebaja
		let txt_sale=forOnlyNodes[0].innerText;
		forOnly.innerHTML="<p>FOR ONLY <br> "+txt_sale+"</p>";
		}
	}
	
