<?php
	
    $conn = new mysqli("34.123.231.44","adan","patata","notificaciones");
    $count = 0;
    $sql2 = "SELECT * FROM datos WHERE estado = 0";
    $result = mysqli_query($conn, $sql2);
    $count = mysqli_num_rows($result);
