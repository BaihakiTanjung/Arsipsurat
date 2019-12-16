<?php
error_reporting(E_ALL ^ E_NOTICE);
include "./config/conn.php";

if($_POST['MODE']=='AJAX'){

	switch ($_POST['functions']) {
		case 'CekLogin':
			$data=$_POST['data'];

			$sql="SELECT COUNT(*) FROM ms_petugas WHERE UserName='".$data['Username']."' and Password='".$data['Password']."'";
			$row=getOne($sql);

			if($row==0){
				echo "Invalid UserName or Password!!!";
				exit();
			}
			session_start();
			$_SESSION['UserID']=$data['Username'];
			echo "success";
		break;
	}
	exit();
}

?>