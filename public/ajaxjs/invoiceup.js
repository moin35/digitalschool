$(document).ready(function(){
	Carga();
});

function Carga(){
	var tablaDatos = $("#datos");

	var route = "http://localhost:8000/admin/add/invoice";

	$("#datos").empty();
	$.get(route, function(res){
		$(res).each(function(key,value){
			tablaDatos.append("<tr>" +
				"<td>"+value.invoice_id+"</td>"+
				"<td>"+value.student_name+"</td>"+
				"<td>"+value.fee_type+"</td>"+
				"<td>"+value.status+"</td>"+
				"<td>"+value.date+"</td>"+
				"<td>"+value.total_amount+"</td>"+
				"<td>"+value.payment_ammount+"</td>"+
				"<td>"+value.due_amount+"</td>"+
				"<td><button value="+value.id+" OnClick='EditFun(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Edit</button><button class='btn btn-danger' value="+value.id+" OnClick='DeleteFee(this);'>Delete</button></td>" +
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
	var route = "http://localhost:8000/admin/edit/invoice/"+btn.value;
	//alert(route);
	$.get(route, function(res){
//alert(res.note);
		$("#feeid").val(res.fee_type);
		$("#sectionid").val(res.section_id);
		$("#amountid").val(res.total_amount);
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