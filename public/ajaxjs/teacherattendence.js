$(document).ready(function(){
	Carga();
});

function Carga(){
	var tablaDatos = $("#datos");

	var route = "http://localhost:8000/teacher/attendence";
	

	$("#tid").empty();
	$.get(route, function(res){
		$(res).each(function(key,value){
			tablaDatos.append("<tr>" +
				"<td>"+value.id+"</td>"+
				"<td>"+value.name+"</td>"+
				"<td>"+value.teacher_id+"</td>"+
				"<td>"+value.email+"</td>"+
				"<td>"+value.phone+"</td>"+
				"<td>"+value.designation+"</td>"+
				
				"</tr>");
		});
	});
}

function DeleteFee(btn){
	var route = "http://localhost:8000/fee/type/delete/"+btn.value+"";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'DELETE',
		dataType: 'json',
		success: function(){
			Carga();
			$("#msj-success").fadeIn();
		}
	});
}

function EditFun(btn){
	var route = "http://localhost:8000/fee/type/edit/"+btn.value;
	//alert(route);
	$.get(route, function(res){
//alert(res.note);
		$("#typeedit").val(res.fee_type);
		$("#noteedit").val(res.note);
		$("#id").val(res.id);
		//alert(res.feetype);
		//console.log(val(res.note));
	});
}

$("#updatefeetype").click(function(){
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