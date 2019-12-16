var selectedData;
$(document).ready(function(){
	LoadData()
})
function AddNew(){
	$(".panel-grid").hide("slide");
	$(".panel-box").show("slide");
	showData();
}
function Close(){
	$(".panel-box").hide("slide");
	$(".panel-grid").show("slide");
}
function showData(data){
	if (data == '' || data == null){
		$("#txtNoDis").val('');
		$("#txtNoDis").prop('disabled',false);
		$("#txtNoAgen").val('');
		$("#txtNoSurat").val('');
		$("#txtKepada").val('');
		$("#txtKet").val('');
		$("#txtStat").val('');
		$("#txtTanggapan").val('');
		

	}else{
		$("#txtNoDis").val(data.no_disposisi);
		$("#txtNoDis").prop('disabled',true);
		$("#txtNoAgen").val(data.no_agenda);
		$("#txtNoSurat").val(data.no_surat);
		$("#txtKepada").val(data.kepada);
		$("#txtKet").val(data.keterangan);
		$("#txtStat").val(data.status_surat);
		$("#txtTanggapan").val(data.tanggapan);
		
	}
}
function Edit(no_disposisi){
	data={};
	data.no_disposisi=no_disposisi;
	$.ajax({
		type: 'post',
		data: {'MODE': 'AJAX', 'functions': 'showData','data':data},
		success: function (returnValue, status){
			selectedData = JSON.parse(returnValue);
			showData(selectedData);
			$(".panel-grid").hide("slide");
			$(".panel-box").show("slide");

		},
		error:function (e){
			
		}
	});

}
function LoadData(){
	$("#disposisi tbody").html("Loading...");
	$.ajax({
		type: 'post',
		data: {'MODE': 'AJAX', 'functions': 'LoadData'},
		success: function (returnValue, status){
			$("#disposisi tbody").html(returnValue);
		},
		error:function (e){
			alertify.alert("Confirmation",e.responseText);
		}
	});

}
function Export(){
	$.ajax({
		type: 'post',
		data: {'MODE': 'AJAX','functions': 'Export'},
		success:function (returnValue, status){
			document.location=returnValue;
	},
	error: function (e) {

	}
	});
}
function Delete(no_disposisi){
	data={};
	data.no_disposisi=no_disposisi;
	$.ajax({
		type: 'post',
		data: {'MODE': 'AJAX', 'functions': 'Delete','data':data},
		success: function (returnValue, status){
			alert('success deleted');
			LoadData();
		},
		error: function (e){
		}
	});
}
function Save(){
	data={};
	data.no_disposisi=$("#txtNoDis").val();
	data.no_agenda=$("#txtNoAgen").val();
	data.no_surat=$("#txtNoSurat").val();
	data.kepada=$("#txtKepada").val();
	data.keterangan=$("#txtKet").val();
	data.status_surat=$("#txtStat").val();
	data.tanggapan=$("#txtTanggapan").val();
	

	if(data.no_disposisi==''){
		alert('No_Disposisi cant be empty!!');
		return false;
	}
	if(data.no_agenda==''){
		alert('Password cant be empty!!');
		return false;
	}
	if(data.no_surat==''){
		alert('No_Agenda cant be empty!!');
		return false;
	}
	if(data.kepada==''){
		alert('Kepada cant be empty!!');
		return false;
	}
	if(data.keterangan==''){
		alert('Keterangan cant be empty!!');
		return false;
	}
	if(data.status_surat==''){
		alert('Status_Surat cant be empty!!');
		return false;
	}
	if(data.Tanggapan==''){
		alert('Tanggapan cant be empty!!');
		return false;
	}
	
	$.ajax({
		type: 'post',
		data: {'MODE': 'AJAX', 'functions': 'AddNew','data':data},
		success: function (returnValue, status){
			if(returnValue=="success"){
				alert('success insert');
				LoadData();
				Close()
			}else{
				alert(returnValue);
			}
		},
		error: function (e){
		}
	});
}