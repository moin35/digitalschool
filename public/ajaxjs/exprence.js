
	$(function(){
 $('#ExpenseTest').on('submit',function(e){
		 $.ajaxSetup({
				 header:$('meta[name="_token"]').attr('content')
		 })
		 e.preventDefault(e);

				 $.ajax({
				 type:"POST",
				 url:'/admin/add/Expense',
				 data:$(this).serialize(),
				 dataType: 'json',
				 success:function(data){

					 $("#msj-success").fadeIn();

							 },
				 error:function(data){
					 $("#msj").html(msj.responseJSON.genre);
					 $("#msj-error").fadeIn();
				 }
		 })
		 });
 });


/*
 	$(function(){
  $('#ExpenseUpdate').on('submit',function(e){
 		 $.ajaxSetup({
 				 header:$('meta[name="_token"]').attr('content')
 		 })
 		 e.preventDefault(e);
    //	var id = $("#id").val();
 				 $.ajax({
 				 type:"POST",
 				 url:'/admin/add/Expense',
 				 data:$(this).serialize(),
 				 dataType: 'json',
 				 success:function(data){

 					 $("#msj-success").fadeIn();

 							 },
 				 error:function(data){
 					 $("#msj").html(msj.responseJSON.genre);
 					 $("#msj-error").fadeIn();
 				 }
 		 })
 		 });
  });*/

 $.ajaxSetup({
		headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
 });
