					function getGenre (select)
					{
							 var wert = select.options[select.options.selectedIndex].value;
							 location.href = './index.php?' + wert;
							 select.form.reset();
							 focus();
					}
					function setVisibility(rowName) 
					{
							// Tabellenzelle ermitteln
					 
							var actualVisibility=document.getElementById(rowName).style.visibility;
					 
							if(actualVisibility=='' || actualVisibility=='visible') {
									document.getElementById(rowName).style.visibility = "hidden";
									document.getElementById(rowName).style.display = "none";
							} else {
									document.getElementById(rowName).style.visibility = "visible";
									document.getElementById(rowName).style.display = ""; 
							}
					}

					function FensterOeffnen (Adresse, width, height, left, top) 
					{  
					 MeinFenster = window.open(Adresse, "DB Uodate", 'width='+width+',height='+height+',left='+left+',top='+top+',scrollbars=yes'); 
						MeinFenster.focus(); 
					}
