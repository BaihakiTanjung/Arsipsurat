<?php
session_start();
$_SESSION['UserID']=='';
session_destroy();
?>
<script>location.href='index.php'</script>