<?php
error_reporting(E_ALL ^ E_NOTICE);
include "./config/conn.php";
include "./lib/session.php";
include "./lib/phpexcel/PHPExcel.php";

if($_POST['MODE']=='AJAX'){
	switch ($_POST['functions']) {
		case 'LoadData':
			$sql="SELECT * FROM ms_petugas";
			$rs=dbQuery($sql);

			while($data=dbArray($rs)){
				echo "<tr>
					<td><input type='button' value='Edit' class='btn btn-info' onclick='Edit(\"".$data['UserName']."\")' />
					<input type='button' value='Delete' class='btn btn-danger' onclick='Delete(\"".$data['UserName']."\")' />
					</td>
					<td>
						".$data['UserName']."
					</td>
					<td>
						".$data['RealName']."
					</td>
					<td>
						".$data['Level']."
					</td>
				</tr>";
			}
		break;
		case 'Delete':
			$data=$_POST['data'];
			$sql="DELETE FROM ms_petugas WHERE UserName='".$data['UserName']."'";
			dbQuery($sql);
			echo "success";
		break;
		case 'showData':
			$data=$_POST['data'];
			$sql="SELECT * FROM ms_petugas WHERE UserName='".$data['UserName']."'";
			$rs=dbQuery($sql);
			$row=dbArray($rs);
			echo json_encode($row);
		break;
		case 'AddNew':
			$data=$_POST['data'];
			if ($data['UserName']==''){
				echo 'UserName cant be empty!!!';
				exit();
			}
			$sql="SELECT count(*) FROM ms_petugas WHERE UserName='".$data['UserName']."'";
			$row=getone($sql);
			if($row==0){
				$sql="INSERT INTO ms_petugas (UserName,Password,RealName,Level)"
					. "SELECT '".$data['UserName']."' as UserName"
					. ",'".$data['Password']."' as Password"
					. ",'".$data['RealName']."' as RealName"
					. ",'".$data['Level']."' as Level";
			dbQuery($sql);
			}else{
				$sql="UPDATE ms_petugas SET"
					. " RealName= '".$data['RealName']."' "
					. " ,Password= '".$data['Password']."' "
					. " ,Level= '".$data['Level']."' "
					. " WHERE UserName= '".$data['UserName']."' ";
				dbQuery($sql);
			}
			echo "success";
		break;
		case "Export":
			$sql = "SELECT * FROM ms_petugas ";
			$exportdata = dbQuery($sql);
			$objPHPExcel = new PHPExcel();

			$objPHPExcel->setActiveSheetIndex(0);
			$worksheet = $objPHPExcel->getActiveSheet();
			$worksheet->setTitle('Petugas');

			$currentrow = 1;
			$worksheet
					->setCellValue('A'.$currentrow,'UserName')
					->setCellValue('B'.$currentrow,'Password')
					->setCellValue('C'.$currentrow,'RealName')
					->setCellValue('D'.$currentrow,'Level');

			$currentrow = $currentrow + 1;
			while ($data = dbArray($exportdata)){
				$worksheet
						->setCellValue('A'.$currentrow, $data['UserName'])
						->setCellValue('B'.$currentrow, $data['Password'])
						->setCellValue('C'.$currentrow, $data['RealName'])
						->setCellValue('D'.$currentrow, $data['Level']);

			$currentrow = $currentrow + 1;
			}

			$filepath = "excel-files/Petugas-".$_SESSION['UserID'].".xlsx";
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
			$objWriter->save($filepath);
			echo $filepath;
			break;
	}
	exit();
}
?>