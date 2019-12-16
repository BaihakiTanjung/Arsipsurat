<?php include "login.php"; ?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Arsip Surat Login</title>
  <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <div class="login_form">
  <setion class="login-wrapper">
    
    <form id="login" method="post" action="#">
      <div class="formlogin">Selamat Datang</div>
      <label for="username">Username</label>
      <input  required name="login[username]" type="text" id="txtUserName" autocapitalize="off" autocorrect="off"/>
      
      <label for="password">Password</label>
      <input class="password" required name="login[password]" type="password" id="txtPassword" />
      <div class="hide-show">
        <span>Show</span>
      </div>
      <button type="button" class="btn btn-primary bt" id="BtnLogin" style="background-color: white;" >Login</button>
    </form>
    
  </section>
</div>
    <script src='js/jquery-3.3.1.min.js'></script>
    <script src="js/index.js"></script>
    <script type="text/javascript" src="js/login.js"></script>




</body>

</html>