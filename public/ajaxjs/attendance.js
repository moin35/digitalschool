
  $(function(){
 $('#studentsAttendence').on('submit',function(e){
     $.ajaxSetup({
         header:$('meta[name="_token"]').attr('content')
     })
     e.preventDefault(e);

         $.ajax({
         type:"POST",
         url:'/students/attendence/',
         data:$(this).serialize(),
         dataType: 'json',
         success:function(data){
        //  $('#sample').html(data);
     			$("#msj-success").fadeIn();

     					},
     		error:function(data){
     		//	$("#msj").html(msj.responseJSON.genre);
     			$("#msj-error").fadeIn();
     		}
     })
     });
 });
