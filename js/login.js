$(document).ready(function(){
	$("#BtnLogin").click(function(){
		CekLogin();
	})
})

function CekLogin(){

	var data={};

	data.Username=$("#txtUserName").val();
	data.Password=$("#txtPassword").val();

	if (data.UserName==""){
		alert("Username cant be empty");
		return false;
	}else if (data.Password==""){
		alert("Password cant be empty");
		return false;
	}

	//$("#BtnLogin").prop('disabled','true');

	 $.ajax({
	 	type: 'post',
	 	data: {'MODE': 'AJAX', 'functions': 'CekLogin', 'data': data},
	 	success: function (returnValue, status){
	 		//$("#BtnLogin").prop('disabled','false');
	 		if (returnValue=='success'){
	 			document.location='dashboard-view.php';
	 		}else{
	 			alert(returnValue);
	 		}
	 	},
	 	error: function (e){
	 		//$("#BtnLogin").prop('disabled','false');
	 		alert(e.responseText);
	 	}
	 });
}