var selectedData;
$(document).ready(function(){
	LoadData();
})
function AddNew(){
	$(".panel-grid").hide("slide");
	$(".panel-box").show("slide");
	showData('');
}

function Close(){
	$(".panel-box").hide("slide");
	$(".panel-grid").show("slide");
}

function showData(data){
	if(data == '' || data == null){
		$("#txtUsername").val('');
		$("#txtUsername").prop('disabled',false);
		$("#txtPassword").val('');
		$("#txtRealname").val('');
		$("#cboLevel").val('');
	}else{
		$("#txtUsername").val(data.UserName);
		$("#txtUsername").prop('disabled',true);
		$("#txtPassword").val(data.Password);
		$("#txtRealname").val(data.RealName);
		$("#cboLevel").val(data.Level);
	}
}

function Edit(UserName){
	data={};
	data.UserName=UserName;
	$.ajax({
		type: 'post',
		data: {'MODE': 'AJAX', 'functions': 'showData', 'data': data},
	 	success: function (returnValue, status){
	 		selectedData = JSON.parse(returnValue);
	 		showData(selectedData);
	 		$(".panel-grid").hide("slide");
	 		$(".panel-box").show("slide");
	 	},
	 	error: function (e){
	 		
	 	}
	 }); 
}

function LoadData(){
	$("#ms_petugas tbody").html('Loading ...');
	$.ajax({
	 	type: 'post',
	 	data: {'MODE': 'AJAX', 'functions': 'LoadData'},
	 	success: function (returnValue, status){
	 		$("#ms_petugas tbody").html(returnValue);
	 	},
	 	error: function (e){
	 		alertify.alert("Confirmation",e.responseText);
	 	}
	 }); 
}

function Export(){
	$.ajax({
	 	type: 'post',
	 	data: {'MODE': 'AJAX', 'functions': 'Export'},
	 	success: function (returnValue, status){
	 		document.location=returnValue;
	 	},
	 	error: function (e){
	 	}
	 }); 
}

function Delete(UserName){
	data={};
	data.UserName=UserName;
	$.ajax({
		type: 'post',
		data: {'MODE': 'AJAX', 'functions': 'Delete', 'data': data},
	 	success: function (returnValue, status){
	 		alert('success deleted');
	 		LoadData();
	 	},
	 	error: function (e){
	 		alertify.alert("Confirmation",e.responseText);
	 	}
	 }); 
}

function Save(){
	data={};	
	data.UserName=$("#txtUsername").val();
	data.Password=$("#txtPassword").val();
	data.RealName=$("#txtRealname").val();
	data.Level=$("#cboLevel").val();

	if(data.UserName==''){
		alert('Username cant be empty!!!!');
		return false;
	}
	if(data.Password==''){
		alert('Password cant be empty!!!!');
		return false;
	}
	if(data.RealName==''){
		alert('Realname cant be empty!!!!');
		return false;
	}
	if(data.Level==''){
		alert('Level cant be empty!!!!');
		return false;
	}


	$.ajax({
		type: 'post',
		data: {'MODE':'AJAX', 'functions': 'AddNew','data': data},
		success: function (returnValue, status){
			if(returnValue=="success"){
				alert('success insert');
				LoadData();
				Close();
			}else{
				alert(returnValue);
			}
		},
		error: function (e){
			
		}
	})
}