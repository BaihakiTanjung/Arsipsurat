<?php
error_reporting(E_ALL ^ E_NOTICE);
include "./config/conn.php";
include "./lib/session.php";
include "./lib/phpexcel/PHPExcel.php";
if($_POST['MODE']=='AJAX'){
	switch ($_POST['functions']){
		case 'LoadData':
		$sql="SELECT * FROM disposisi";
		$rs=dbQuery($sql);

			while($data=dbArray($rs)){
			echo "<tr>
					<td><input type='button' value='Edit' class='btn btn-info' onclick='Edit(\"".$data['no_disposisi']."\")' />
					<input type='button' value='Delete' class='btn btn-danger' onclick='Delete(\"".$data['no_disposisi']."\")' />
					</td>
					<td>
						".$data['no_disposisi']."
					</td>
					<td>
						".$data['no_agenda']."
					</td>
					<td>
						".$data['no_surat']."
					</td>
					<td>
						".$data['kepada']."
					</td>
					<td>
						".$data['keterangan']."
					</td>
					<td>
						".$data['status_surat']."
					</td>
					<td>
						".$data['tanggapan']."
					</td>
				</tr>";
		}
		break;
		case 'Delete':
			$data=$_POST['data'];
			$sql="DELETE FROM disposisi WHERE no_disposisi='".$data['no_disposisi']."'";
			dbQuery($sql);
			echo "success" ;
			break;
		case 'showData':
			$data=$_POST['data'];
			$sql="SELECT * FROM disposisi WHERE no_disposisi='".$data['no_disposisi']."'";
			$rs=dbQuery($sql);
			$row=dbArray($rs);
			echo json_encode($row);
			break;
		case 'AddNew':
			$data=$_POST['data'];
			if ($data['no_disposisi']==''){
				echo 'No Disposisi Cant Be Empty!!';
				exit();
			}
			$sql="SELECT COUNT(*) FROM disposisi WHERE no_disposisi='".$data['no_disposisi']."'";
			$row=getOne($sql);
			if ($row==0){
			$sql="INSERT INTO disposisi (no_disposisi,no_agenda,no_surat,kepada,keterangan,status_surat,tanggapan)"
				. "SELECT '".$data['no_disposisi']."' as no_disposisi"
				. ",'".$data['no_agenda']."' as no_agenda"
				. ",'".$data['no_surat']."' as no_surat"
				. ",'".$data['kepada']."' as kepada"
				. ",'".$data['keterangan']."' as Keterangan"
				. ",'".$data['status_surat']."' as status_surat"
				. ",'".$data['tanggapan']."' as tanggapan";
				
				dbQuery($sql);
			}else{
			$sql="UPDATE disposisi SET "
					."no_agenda='".$data['no_agenda']."'"
					." ,no_surat='".$data['no_surat']."'"
					." ,kepada='".$data['kepada']."'"
					." ,keterangan='".$data['keterangan']."'"
					." ,status_surat='".$data['status_surat']."'"
					." ,tanggapan='".$data['tanggapan']."'"
					." WHERE no_disposisi='".$data['no_disposisi']."'";
					dbQuery($sql);
			}
		echo "success";
		break;
		case "Export":
			$sql = "SELECT * FROM disposisi";
			$exportdata = dbQuery($sql);
			$objPHPExcel = new PHPExcel();

			$objPHPExcel -> setActiveSheetIndex(0);
			$worksheet = $objPHPExcel->getActiveSheet();
			$worksheet->setTitle('disposisi');

			$currentrow = 1;
			$worksheet
				->setCellValue('A' . $currentrow, 'no_disposisi')
				->setCellValue('B' . $currentrow, 'no_agenda')
				->setCellValue('C' . $currentrow, 'no_surat')
				->setCellValue('D' . $currentrow, 'kepada')
				->setCellValue('E' . $currentrow, 'keterangan')
				->setCellValue('F' . $currentrow, 'status_surat')
				->setCellValue('G' . $currentrow, 'tanggapan');

			$currentrow = $currentrow +1;

			while ($data = dbarray($exportdata)){
				$worksheet
					->setCellValue('A'. $currentrow,$data['no_disposisi'])
					->setCellValue('B'. $currentrow,$data['no_agenda'])
					->setCellValue('C'. $currentrow,$data['no_surat'])
					->setCellValue('D'. $currentrow,$data['kepada'])
					->setCellValue('E'. $currentrow,$data['keterangan'])
					->setCellValue('F'. $currentrow,$data['status_surat'])
					->setCellValue('G'. $currentrow,$data['tanggapan']);
				$currentrow = $currentrow + 1;
		}
			$filePath = "excel-files/Disposisi-" . $_SESSION['UserID'] . ".xlsx";
			$objWriter =PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save($filePath);
			echo $filePath;
			break;
		}
	exit();
}
?>