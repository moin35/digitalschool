$("#updateMarkInfo").click(function(){
  
	var value = $("#id").val();
	var type = $("#typeedit").val();
	var editnote = $("#noteedit").val();
	var route = "http://localhost:8000/fee/type/edit/"+value+"";
	//alert(route);
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: { moin: type, saif: editnote},

		success: function(){
			Carga();

			$("#myModal").modal('toggle');
			$("#msj-mon").fadeIn();
		}
	});
});
