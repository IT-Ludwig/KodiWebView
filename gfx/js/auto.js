$('#getMovie').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : './auto.php',
			dataType: "json",
			method: 'post',
			data: {
			   name_startsWith: request.term,
			   type: 'getIMDB',
			   row_num : 1
			},
			 success: function( data ) {
				 response( $.map( data, function( item ) {
				 	var code = item.split("|");
					return {
						label: code[0],
						value: code[0],
						data : item
					}
				}));
			}
		});
	},
	autoFocus: true,	      	
	minLength: 0,
	select: function( event, ui ) {
		var names = ui.item.data.split("|");						
		$('#getIMDB').val(names[1]);
	}		      	
});