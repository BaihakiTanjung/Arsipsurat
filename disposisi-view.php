<?php include "disposisi.php";?>
<html>

    <head>
        <meta charset="utf-8">
		<?php include 'header.php'; ?>
		<script type="text/javascript" src="js/disposisi.js"></script>
		<title>Arsip Surat</title>
    </head>
    <body>
		<?php include 'menu.php'; ?>
		<div class="main card-body">
		
				<div class="row" >

				<div class="col-md-12">
				<div id="panel1" class="card border-danger" style="margin-top:0px;">
					<div class="card-header bg-danger">
						<h3 class="card-title" style="color:white;"><div class="fa fa-envelope-square"> Disposisi</h3>
					</div>
					<div class="card-body">
						<div class="panel-box" style="display:none">
						No Disposisi:<input type="text" id="txtNoDis" class="form-control material" placeholder="No Disposisi"><br>
						No Agenda:<input type="text" id="txtNoAgen" class="form-control material" placeholder="No Agenda"><br>
						No Surat:<input type="text" id="txtNoSurat" class="form-control material" placeholder="No Surat"><br>
						Kepada:<input type = 'text' id="txtKepada" class="form-control material" placeholder="Kepada"><br>
						Keterangan:<textarea type="text" id="txtKet" class="form-control material" placeholder="Keterangan"></textarea><br>
						
						Status Surat:<select id="txtStat" class="custom-select my-1 mr-sm-2">
						<option value=""></option>
						<option value="Dikirim">Dikirim</option>
						<option value="Belum Dibaca">Belum Dibaca</option>
						<option value="Dibaca">Dibaca</option>
						</select>
						<br>
						<br>
						Tanggapan:<textarea type="text" id="txtTanggapan" class="form-control material" placeholder="Tanggapan"></textarea><br>
						
						</br>
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
						

						<table id="disposisi" border="1" style="margin-top: 10px" class="table table-hover table table-bordered table-striped">
							<thead>
								<tr>
									<td>Action</td>
									<td><NAV>No_Disposisi</NAV></td>
									<td>No_Agenda</td>
									<td>No_Surat</td>
									<td>Kepada</td>
									<td>Keterangan</td>
									<td>Status_Surat</td>
									<td>Tanggapan</td>
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
					</div>
					</div>
					</div>
					</body>
					</html>
