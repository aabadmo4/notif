<?php
session_start();

	$conn = new mysqli("34.123.231.44","adan","patata","notificaciones");
	$count=0;
	if(!empty($_POST['add'])) {
		$mensaje = mysqli_real_escape_string($conn,$_POST["mensaje"]);
		$sql = "INSERT INTO datos (autor,mensaje, destinatario,chat_id) VALUES('" . $_SESSION["logged_user"] . "','" . $mensaje . "','".$_POST["destinatario"]."','".$_POST["chat"]."')";
		mysqli_query($conn, $sql);
	}
	$sql2="SELECT * FROM datos WHERE chat_id=".$_SESSION["chat"]."AND estado = 0 AND autor <> '".$_SESSION["logged_user"]."'";
	$result=mysqli_query($conn, $sql2);
	$count=mysqli_num_rows($result);

	header( 'Location: ../' ) ;
?>
