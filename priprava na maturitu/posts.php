<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
 $name = $_SESSION['name'];
 $connection =  mysqli_connect('localhost', 'mlejnek', 'Heslo', '6ep_mlejnek');
 $sqlQuery = "SELECT * FROM posts WHERE username='$name'";
 $query = mysqli_query($connection, $sqlQuery);
 $posts = mysqli_fetch_all($query, MYSQLI_ASSOC);
// var_dump($posts[1]);
for($i =0; $i < count($posts); $i++){
    if($posts[$i]['important'] == 0){
        echo '<a href="detail.php?id='.$posts[$i]['id'].'">'.$posts[$i]['title'].'</a> <a href="addStar.php?id='.$posts[$i]['id'].'">pridat hvezdicku</a> <a href="deletePost.php?id='.$posts[$i]['id'].'">smazat</a><br/>';
    }
    else{
        echo '<a href="detail.php?id='.$posts[$i]['id'].'">'.$posts[$i]['title'].'</a> <a href="removeStar.php?id='.$posts[$i]['id'].'">odebrat hvezdicku</a> <a href="deletePost.php?id='.$posts[$i]['id'].'">smazat</a><br/>';
    }
}

?>
</body>
</html>
