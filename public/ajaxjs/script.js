$("#feesubmit").click(function(){
	var fee = $("#feetype").val();
	var note = $("#note").val();

	var route = "/admin/add/account/fee/type";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{feetype: fee,note:note},

		success:function(){

			$("#msj-success").fadeIn();

					},
		error:function(msj){
			$("#msj").html(msj.responseJSON.genre);
			$("#msj-error").fadeIn();
		}
	});
});
