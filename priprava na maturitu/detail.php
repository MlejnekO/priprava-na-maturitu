<?php
$id =$_GET['id'];
session_start();
 $name = $_SESSION['name'];
 $connection =  mysqli_connect('localhost', 'mlejnek', 'Heslo', '6ep_mlejnek');
 $sqlQuery = "SELECT * FROM posts WHERE id='$id'";
 $query = mysqli_query($connection, $sqlQuery);
 $posts = mysqli_fetch_all($query, MYSQLI_ASSOC);

 for($i =0; $i < count($posts); $i++){
    echo $posts[$i]['title'].'<br/>'.$posts[$i]['body'].'<br/>';
}
echo '<a href="posts.php">zpet</a>';