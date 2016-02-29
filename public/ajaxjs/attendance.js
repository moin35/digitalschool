


  $(function(){
 $('#studentsAttendence').on('submit',function(e){
     $.ajaxSetup({
         header:$('meta[name="_token"]').attr('content')
     })
     e.preventDefault(e);

     $('#at').on('change', function () {
       this.value = this.checked ? 1 : 0;
         //console.log(this.value);
         //alert(this.value);
     }).change();



         $.ajax({
         type:"POST",
         url:'/all/students/attendence/',
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
