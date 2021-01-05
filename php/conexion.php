<?php
	
    $conn = new mysqli("34.123.231.44","adan","patata","notificaciones");
    $count = 0;
    $sql2 = "SELECT * FROM datos WHERE chat_id=".$_SESSION["chat"]." AND estado = 0 ";
    $result = mysqli_query($conn, $sql2);
    $count = mysqli_num_rows($result);
    
    $sql22 = "SELECT * FROM datos WHERE chat_id=".$_SESSION["chat"]." AND estado = 0 AND autor <> '".$_SESSION["logged_user"]."'";
    $result2 = mysqli_query($conn, $sql22);
    $count2 = mysqli_num_rows($result);
