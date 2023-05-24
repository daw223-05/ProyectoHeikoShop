let urlActual=window.location.href;
			console.log(urlActual);
		
		
		if(urlActual.includes("categoria-producto")){
		  	let regex = /categoria-producto\/(.*?)\//;
  			let resultado = regex.exec(urlActual);
			let enlaces=document.querySelectorAll("a[href=\'http://27.0.173.251:8080/categoria-producto/"+resultado[1]+"/\']");
			console.log(enlaces);
			for(let i = 0; i<enlaces.length; i++){
			enlaces[i].firstChild.classList.add("categori-subrayado");
			}
		}