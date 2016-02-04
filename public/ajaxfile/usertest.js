        $("#registro").click(function(){
        	var dato = $("#name").val();
          var birth = $("#dbirth").val();
          var dgender = $("#gender").val();
          var Relig = $("#Religion").val();
          var addess = $("#address").val();
          var email = $("#email").val();
          var uphone = $("#phone").val();
          var ujobinDate = $("#jobinDate").val();
          var uimage = $("#image").val();
          var utype = $("#utype").val();
          var uusername = $("#username").val();
          var ucp = $("#conpass").val();
          var route = "/user/index";
        	var token = $("#token").val();

        	$.ajax({
        		url: route,
        		headers: {'X-CSRF-TOKEN': token},
        		type: 'POST',
        		dataType: 'json',
        		data:{name: dato, dbirth: birth , gender: dgender,Religion:Relig,address:addess,email:email,phone:uphone,jobinDate:ujobinDate,image:uimage,utype:utype,username:uusername,conpass:ucp},
        		success:function(){           
        			$("#msj-success").fadeIn();
        		},
        		error:function(msj){
        			$("#msj").html(msj.responseJSON.genre);
        			$("#msj-error").fadeIn();
        		}
        	});
            //location.load();
        });
