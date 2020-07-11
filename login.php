<?php
session_start();

if(isset($_POST['username'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $id=$_POST['id'];
    include('connect.php');
    $sql="select * from usuari where username='".$username."' and password='".$password."'";
    $myquery = $mysqli->query($sql);
    if ($myquery->num_rows > 0) {
        $_SESSION['user']=$username;
        if($id!=""){
            header('Location: http://www.iessineu.net/QR/edita.php?id='.$id);
            exit;
        }else{
            header('Location: http://www.iessineu.net/QR/admin.php');
            exit;
        }
    }else{
        echo "Contrasenya incorrecta";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main.js" ></script>
</head>
<body class="cover">
	<div class="container-login">
		<p class="text-center" style="font-size: 80px;">
			<i class="zmdi zmdi-account-circle"></i>
		</p>
		<p class="text-center text-condensedLight">Aquest lloc és privat</p>
		<form method="post" action="login.php">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			    <input class="mdl-textfield__input" type="text" id="userName" name="username">
			    <label class="mdl-textfield__label" for="userName">Nom d'usuari</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			    <input class="mdl-textfield__input" type="password" id="pass" name="password">
			    <label class="mdl-textfield__label" for="pass">Contrasenya</label>
			</div>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
			<button id="SingIn" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #3F51B5; float:right;">
				Entra <i class="zmdi zmdi-mail-send"></i>
			</button>
		</form>
	</div>
</body>
</html>
