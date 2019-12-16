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
		$("#txtNoAgenda").val('');
		$("#txtNoAgenda").prop('disabled',false);
		$("#txtid").val('');
		$("#txtJenisSurat").val('');
		$("#txtTanggalKirim").val('');
		$("#txtNoSurat").val('');
		$("#txtPengirim").val('');
		$("#txtPerihal").val('');
	}else{
		$("#txtNoAgenda").val(data.no_agenda);
		$("#txtNoAgenda").prop('disabled',true);
		$("#txtid").val(data.Id);
		$("#txtJenisSurat").val(data.jenis_surat);
		$("#txtTanggalKirim").val(data.tanggal_kirim);
		$("#txtNoSurat").val(data.no_surat);
		$("#txtPengirim").val(data.pengirim);
		$("#txtPerihal").val(data.perihal);
	}
}

function Edit(no_agenda){
	data={};
	data.no_agenda=no_agenda;
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
	$("#surat_keluar tbody").html('Loading ...');
	$.ajax({
	 	type: 'post',
	 	data: {'MODE': 'AJAX', 'functions': 'LoadData'},
	 	success: function (returnValue, status){
	 		$("#surat_keluar tbody").html(returnValue);
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

function Delete(no_agenda){
	data={};
	data.no_agenda=no_agenda;
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
	data.no_agenda=$("#txtNoAgenda").val();
	data.Id=$("#txtid").val();
	data.jenis_surat=$("#txtJenisSurat").val();
	data.tanggal_kirim=$("#txtTanggalKirim").val();
	data.no_surat=$("#txtNoSurat").val();
	data.pengirim=$("#txtPengirim").val();
	data.perihal=$("#txtPerihal").val();

	if(data.no_agenda==''){
		alert('Number Agenda cant be empty!!!!');
		return false;
	}
	if(data.Id==''){
		alert('ID cant be empty!!!!');
		return false;
	}
	if(data.jenis_surat==''){
		alert('Jenis_surat cant be empty!!!!');
		return false;
	}
	if(data.tanggal_kirim==''){
		alert('Tanggal_Kirim cant be empty!!!!');
		return false;
	}
	if(data.tanggal_terima==''){
		alert('Tanggal_Terima cant be empty!!!!');
		return false;
	}
	if(data.no_surat==''){
		alert('No_Surat cant be empty!!!!');
		return false;
	}
	if(data.pengirim==''){
		alert('Pengirim cant be empty!!!!');
		return false;
	}
	if(data.perihal==''){
		alert('Perihal cant be empty!!!!');
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