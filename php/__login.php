<?php
session_start();
$_SESSION["logged_user"]=$_GET["user"];
$_SESSION["chat"]=$_GET["chat"];
header("location:../index");