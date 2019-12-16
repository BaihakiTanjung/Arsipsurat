<?php
session_start();
if ($_SESSION['UserID']==''){
	echo "<script>location.href='index.php'</script>";
} 
?>