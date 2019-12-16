<?php

$dbUser="root";
$dbPassword="";
$dbServer="localhost";
$dbName="arsip_surat2";

function dbConn(){
	global $dbPassword,$dbUser,$dbServer,$dbName;
	$conn=mysqli_connect($dbServer,$dbUser,$dbPassword,$dbName);
	return $conn;
}
function dbQuery($SQL){
	$conn=dbConn();
	$rs=mysqli_query($conn,$SQL) or die(mysqli_error($conn));
	return $rs;
}
function dbArray($rs){
	$conn=dbConn();
	$data=mysqli_fetch_array($rs);
	return $data;
}
function getOne($SQL){
	$rs=dbQuery($SQL);
	$data=dbArray($rs);
	return $data[0];
}
?>