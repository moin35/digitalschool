$("#invoiceadd").click(function(){
	var cls = $("#classid").val();
	var sec = $("#sectionid").val();
	var std = $("#studentid").val();
	var fee = $("#feeid").val();
	var amn = $("#amountid").val();
	var date = $("#dateid").val();
	var pamount = $("#paidamountid").val();

	var route = "/admin/add/invoice";
	var token = $("#token").val();
	var formData = $("#myform").serializeArray();
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{class: cls,section:sec,student:std,feetype:fee,amount:amn,date:date,paid:pamount},

		//data: $("#invoiceadd").serialize(),

		success:function(){

			$("#msj-success").fadeIn();

					},
		error:function(msj){
			$("#msj").html(msj.responseJSON.genre);
			$("#msj-error").fadeIn();
		}
	});
});
