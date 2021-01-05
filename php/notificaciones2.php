<?php
session_start();
$conn = new mysqli("34.123.231.44","adan","patata","notificaciones");

if($_SESSION["chat"]==1){
    $sql = "UPDATE datos SET estado = 1 WHERE chat_id=1 AND estado = 0";	
    $result = mysqli_query($conn, $sql);
    $sql = "SELECT * FROM datos WHERE chat_id = 1 ORDER BY id DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);
}else if($_SESSION["chat"]==2){
    $sql = "UPDATE datos SET estado = 1 WHERE chat_id=2 AND estado = 0";	
    $result = mysqli_query($conn, $sql);
    $sql = "SELECT * FROM datos WHERE chat_id = 2 ORDER BY id DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);
}





$response='';

while($row=mysqli_fetch_array($result)) {
 
	/* Formate fecha */
	$fechaOriginal = $row["fecha"];
	$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

	$response = $response . "<div class='notification-item'>" .
	"<div class='notification-subject'><a href=''>". $row["autor"] . "</a> - <span>". $fechaFormateada . "</span> </div>" . 
	"<div class='notification-comment'>" . "Chat: ". $row["chat_id"]. 
                ".<br>"."Destinatario: ". $row["destinatario"]. ".<br>". $row["mensaje"]."<br><a href=''><i>Borrar mensaje</i></a>". "</div>" .
	"</div>";
}
if(!empty($response)) {
	print $response;
}


?>