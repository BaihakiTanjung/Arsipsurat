<?php include "suratmasuk.php"; ?>
<html>

    <head>
        <meta charset="utf-8">
        <title>Arsip Surat</title>
		<?php include 'header.php'; ?>
		<script type="text/javascript" src="js/suratmasuk.js"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
		<?php include 'menu.php'; ?>
		<div class="main card-body">
		
				<div class="row" >

				<div class="col-md-12">
				<div id="panel1" class="card border-danger" style="margin-top:0px;">
					<div class="card-header bg-danger">
						<h3 class="card-title" style="color:white;">Data Surat Masuk</h3>
					</div>
				<div class="card-body">
					<div class="panel-box" style="display:none">
<body>

<h3>Input</h3>

<div> 
    <label for="no_agenda">Nomor Agenda</label>
    <input type="text" id="txtNoAgenda" placeholder=".."/></br>

    <label for="Id">Id</label>
    <input type="text" id="txtid" placeholder="Your Id .."/></br> 

    <label for="jenis_surat">Jenis Surat</label>
    <input type="text" id="txtJenisSurat" placeholder=".."/></br> 

    <label for="tanggal_kirim">Tanggal Kirim</label>
    <input type="date" id="txtTanggalKirim" placeholder=".."/></br>

    <label for="tanggal_terima">Tanggal Terima</label>
    <input type="date" id="txtTanggalterima" placeholder=".."/></br>

    <label for="NoSurat">Nomor Surat</label>
    <input type="text" id="txtNoSurat" placeholder=".."/></br>

    <label for="pengirim">Pengirim</label>
    <input type="text" id="txtPengirim" placeholder=".."/></br>

    <label for="perihal">Perihal</label>
    <input type="text" id="txtPerihal" placeholder=".."/></br>
</div>

</body>
</html>
						<button type="button" class="btn waves btn-labeled btn-danger waves-effect waves-float" onclick='Close()'>
                        <span class="btn-label"><i class="fa fa-remove (alias)"></i></span> Close
                        </button>
                        <button type="button" class="btn waves btn-labeled btn-success waves-effect waves-float" onclick='Save()'>
                        <span class="btn-label"><i class="fa fa-plus"></i></span> Save
                        </button>
					</div>

					<div class="panel-grid" >
						<button type="button" class="btn waves btn-labeled btn-primary waves-effect waves-float" onclick='AddNew()'>
                        <span class="btn-label"><i class="fa fa-plus-square"></i></span> AddNew
                        </button>
                        <button type="button" class="btn waves btn-labeled btn-warning waves-effect waves-float" onclick='LoadData()'>
                        <span class="btn-label"><i class="fa fa-refresh"></i></span> Refresh
                        </button>
                        <button type="button" class="btn waves btn-labeled btn-secondary waves-effect waves-float" onclick='Export()'>
                        <span class="btn-label"><i class="fa fa-book"></i></span> Export
                        </button>
                        

						<table class="table table-hover table table-bordered table-striped" id="surat_masuk" border="1" style="margin-top: 10px">
							<thead>
								<tr>
									<td>Action</td>
									<td><NAV>Nomor Agenda</NAV></td>
									<td>id</td>
									<td>Jenis Surat</td>
									<td>Tanggal Kirim</td>
									<td>Tanggal Terima</td>
									<td>Nomor Surat</td>
									<td>Pengirim</td>
									<td>Perihal</td>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>

					</div>
					</div>
		</div>

		</div>

		</div>
	</body>

</html>
