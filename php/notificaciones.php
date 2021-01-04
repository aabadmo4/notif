<?php
$conn = new mysqli("34.123.231.44","adan","patata","notificaciones");

$sql = "UPDATE datos SET estado = 1 WHERE estado = 0";	
$result = mysqli_query($conn, $sql);

$sql = "SELECT * FROM datos ORDER BY id DESC LIMIT 10";
$result = mysqli_query($conn, $sql);

$response='';

while($row=mysqli_fetch_array($result)) {
 
	/* Formate fecha */
	$fechaOriginal = $row["fecha"];
	$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

	$response = $response . "<div class='notification-item'>" .
	"<div class='notification-subject'>". $row["autor"] . " - <span>". $fechaFormateada . "</span> </div>" . 
	"<div class='notification-comment'>" . "Destinatario:". $row["destinatario"]. "<br>". $row["mensaje"]  . "</div>" .
	"</div>";
}
if(!empty($response)) {
	print $response;
}


?>