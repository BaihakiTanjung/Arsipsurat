<?php include "petugas.php"; ?>
<html>

    <head>
        <meta charset="utf-8">
        <title>Arsip Surat</title>
		<?php include 'header.php'; ?>
		<script type="text/javascript" src="js/petugas.js"></script>
		<link rel="stylesheet" href="css/style.css">
    </head>

    <body>
		<?php include 'menu.php'; ?>
		<div class="main card-body">
		
				<div class="row" >

				<div class="col-md-12">
				<div id="panel1" class="card border-danger" style="margin-top: 0px;">
					<div class="card-header bg-danger">
						<h3 class="card-title" style="color:white;">Data Petugas</h3>
					</div>
				<div class="card-body">
					<div class="panel-box" style="display:none">
<body>
<h3>Input</h3>
<div>
  <form action="/action_page.php">
    <label for="UserName">Username</label>
    <input type="text" id="txtUsername" placeholder="Your Username.."/></br>

    <label for="Password">Password</label>
    <input type="text" id="txtPassword" placeholder="Your Password .."/></br> 

    <label for="RealName">Realname</label>
    <input type="text" id="txtRealname" placeholder="Your Realname .."/></br> 

    <label for="Level">Level</label>
    <select id="cboLevel" name="Level">
      <option value="Administrator">Administrator</option>
      <option value="User">User</option>
    </select>
  </form>
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
						
						<table id="ms_petugas" border=1 style="margin-top: 10px"class="table table-hover table table-bordered table-striped">
							<thead>
								<tr>
									<td>Action</td>
									<td>Username</td>
									<td>Realname</td>
									<td>Level</td>
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
