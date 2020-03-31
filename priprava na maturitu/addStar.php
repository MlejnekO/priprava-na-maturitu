<?php

$id = $_GET['id'];
$sqlQuery = "UPDATE posts SET important=1 WHERE id='$id'";
$connection =  mysqli_connect('localhost', 'mlejnek', 'Heslo', '6ep_mlejnek');
$query = mysqli_query($connection, $sqlQuery);
header('location: posts.php');