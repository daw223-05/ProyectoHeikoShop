<?php
$type_searchTag = "false";
	$url_actual = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	if (strpos($url_actual, "etiqueta-producto") == true){
		echo'
				<script type="text/JavaScript"> 
					let bloque = document.getElementsByClassName("margin_bottom_to_0")[0];
					bloque.innerHTML = "<h4>Filter by Tag Disabled</h4><h5>(Already on tag group)</h5>";
					console.log(bloque);
					bloque = document.getElementsByClassName("progress-bar-tags")[0].parentNode;
					bloque.style.visibility = "hidden";
					bloque.style.display = "none";
					console.log(bloque);
				</script>
			';
	}else{
		if (strpos($url_actual, "query_type_tags=and") == true){
		$type_searchTag = "true";
		}else if (strpos($url_actual, "query_type_tags=or") == true) {
			$type_searchTag = "false";
		}else{
			if (isset($_POST["switch_tag"])) {
				$type_searchTag = $_POST["switch_tag"];
			}
		}


		echo'
		<script type="text/JavaScript"> 
			let switch_tag =document.getElementsByClassName("switch_any");
			if(switch_tag.length>0){
			if('.$type_searchTag.'==true){
				 switch_tag[0].childNodes[1].setAttribute("checked", "checked");
			}else{
				if (switch_tag[0].childNodes[1].getAttribute("checked")) {
				 switch_tag[0].childNodes[1].removeAttribute("checked");
				}
			}

			switch_tag[0].addEventListener("change", function(){

				var form = document.createElement("form");
				form.setAttribute("method", "POST");
				form.setAttribute("action", "http://27.0.173.251:8080/products/");

				var switchInput = document.createElement("input");
				switchInput.setAttribute("type", "hidden");
				switchInput.setAttribute("name", "switch_tag");
				if(switch_tag[0].childNodes[1].checked){
					switchInput.setAttribute("value", "true");
				}else{
					switchInput.setAttribute("value", "false");
				}

				form.appendChild(switchInput);
				document.body.appendChild(form);
				form.submit();
			});

			document.getElementsByClassName("margin_bottom_to_0")[0].parentNode.style.marginBottom="10px";


			let counter_tags = 0;
			let progress_tags = document.getElementsByClassName("progress-tags")[0];
			const intervalId = setInterval(() => {
			  counter_tags++;
			  if (counter_tags === 6) {
				clearInterval(intervalId);

			  } else {
			  const progressWith = progress_tags.offsetWidth;
				let progressPorcent = (progressWith / progress_tags.parentNode.offsetWidth) * 100;
				progressPorcent = progressPorcent + 20;
				progress_tags.style.width = progressPorcent+"%";
			  }
			}, 1000);




			setTimeout(function() {
					let findFilterAll=document.getElementsByClassName("by_tag_all")[0];
					let findFilterAny=document.getElementsByClassName("by_tag_any")[0];

					let filt=null;
					let filt_save=null;

					if('.$type_searchTag.'==true){
						filt=findFilterAll;
						filt_remove=findFilterAny;
					}else{
						filt=findFilterAny;
						filt_remove=findFilterAll;
					}
						let filt_ul=filt.childNodes[0].childNodes[0].childNodes[0].childNodes[0];
						filt.style.visibility = "visible";
						filt.style.display = "block";
						for(let i = 0; i<filt_ul.childNodes.length; i++){
							let liInputs = filt_ul.childNodes[i].getElementsByTagName("input");
							let liInput = liInputs[0];
							if(liInput.checked){
								liInput.parentNode.classList.add("color-activo");
							}
							liInput.addEventListener("change", function() {
							  if (this.checked) {
								this.parentNode.classList.add("color-activo");
							  } else {
								this.parentNode.classList.remove("color-activo");
							  }
							});
						}

					progress_tags.parentNode.parentNode.remove();
					filt_remove.parentNode.remove();
			}, 5500);

					}
		</script>
		';
	}
	;
