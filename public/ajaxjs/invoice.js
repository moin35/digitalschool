$("#invoiceadd").click(function(){
	//var fee = $("#feetype").val();
	//var note = $("#note").val();

	var route = "/admin/add/invoice";
	var token = $("#token").val();
	var formData = $("#myform").serializeArray();
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		//data:{feetype: fee,note:note},

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
