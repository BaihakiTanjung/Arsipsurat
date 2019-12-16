<?php
error_reporting(E_ALL ^ E_NOTICE);
include "./config/conn.php";
include "./lib/session.php";
include "./lib/phpexcel/PHPExcel.php";

if($_POST['MODE']=='AJAX'){
	switch ($_POST['functions']) {
		case 'LoadData':
			$sql="SELECT * FROM surat_keluar";
			$rs=dbQuery($sql);

			while($data=dbArray($rs)){
				echo "<tr>
					<td><input type='button' value='Edit' class='btn btn-info' onclick='Edit(\"".$data['no_agenda']."\")' />
					<input type='button' value='Delete' class='btn btn-danger' onclick='Delete(\"".$data['no_agenda']."\")' />
					</td>
					<td>
						".$data['no_agenda']."
					</td>
					<td>
						".$data['Id']."
					</td>
					<td>
						".$data['jenis_surat']."
					</td>
					<td>
						".$data['tanggal_kirim']."
					</td>
					<td>
						".$data['no_surat']."
					</td>
					<td>
						".$data['pengirim']."
					</td>
					<td>
						".$data['perihal']."
					</td>
				</tr>";
			}
		break;
		case 'Delete':
			$data=$_POST['data'];
			$sql="DELETE FROM surat_keluar WHERE no_agenda='".$data['no_agenda']."'";
			dbQuery($sql);
			echo "success";
		break;
		case 'showData':
			$data=$_POST['data'];
			$sql="SELECT * FROM surat_keluar WHERE no_agenda='".$data['no_agenda']."'";
			$rs=dbQuery($sql);
			$row=dbArray($rs);
			echo json_encode($row);
		break;
		case 'AddNew':
			$data=$_POST['data'];
			if ($data['no_agenda']==''){
				echo 'Nomor Agenda cant be empty!!!';
				exit();
			}
			$sql="SELECT count(*) FROM surat_keluar WHERE no_agenda='".$data['no_agenda']."'";
			$row=getone($sql);
			if($row==0){
				$sql="INSERT INTO surat_keluar (no_agenda,Id,jenis_surat,tanggal_kirim,no_surat,pengirim,perihal)"
					. "SELECT '".$data['no_agenda']."' as no_agenda"
					. ",'".$data['Id']."' as Id"
					. ",'".$data['jenis_surat']."' as jenis_surat"
					. ",'".$data['tanggal_kirim']."' as tanggal_kirim"
					. ",'".$data['no_surat']."' as no_surat"
					. ",'".$data['pengirim']."' as pengirim"
					. ",'".$data['perihal']."' as perihal";
			dbQuery($sql);
			}else{
				$sql="UPDATE surat_keluar SET"
					. " Id= '".$data['Id']."' "
					. " ,jenis_surat= '".$data['jenis_surat']."' "
					. " ,tanggal_kirim= '".$data['tanggal_kirim']."' "
					. " ,no_surat= '".$data['no_surat']."' "
					. " ,pengirim= '".$data['pengirim']."' "
					. " ,perihal= '".$data['perihal']."' "
					. " WHERE no_agenda= '".$data['no_agenda']."' ";
				dbQuery($sql);
			}
			echo "success";
		break;
		case "Export":
			$sql = "SELECT * FROM surat_masuk ";
			$exportdata = dbQuery($sql);
			$objPHPExcel = new PHPExcel();

			$objPHPExcel->setActiveSheetIndex(0);
			$worksheet = $objPHPExcel->getActiveSheet();
			$worksheet->setTitle('SuratMasuk');

			$currentrow = 1;
			$worksheet
					->setCellValue('A'.$currentrow,'no_agenda')
					->setCellValue('B'.$currentrow,'Id')
					->setCellValue('C'.$currentrow,'jenis_surat')
					->setCellValue('D'.$currentrow,'tanggal_kirim')
					->setCellValue('F'.$currentrow,'no_surat')
					->setCellValue('G'.$currentrow,'pengirim')
					->setCellValue('H'.$currentrow,'perihal');

			$currentrow = $currentrow + 1;
			while ($data = dbArray($exportdata)){
				$worksheet
						->setCellValue('A'.$currentrow, $data['no_agenda'])
						->setCellValue('B'.$currentrow, $data['Id'])
						->setCellValue('C'.$currentrow, $data['jenis_surat'])
						->setCellValue('D'.$currentrow, $data['tanggal_kirim'])
						->setCellValue('F'.$currentrow, $data['no_surat'])
						->setCellValue('G'.$currentrow, $data['pengirim'])
						->setCellValue('H'.$currentrow, $data['perihal']);

			$currentrow = $currentrow + 1;
			}

			$filepath = "excel-files/SuratKeluar-".$_SESSION['UserID'].".xlsx";
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
			$objWriter->save($filepath);
			echo $filepath;
			break;
	}
	exit();
}
?>