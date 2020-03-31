<?php
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){

    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){
        $name  = $_POST['name'];
        $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email  = $_POST['email'];
        $connection =  mysqli_connect('localhost', 'mlejnek', 'Heslo', '6ep_mlejnek');
        $sqlQuery = "SELECT * FROM users WHERE username='$name'";
        $query = mysqli_query($connection, $sqlQuery);
       
        if(!mysqli_fetch_assoc($query)){
            //uzivatel neexistuje
            $sqlQuery = "INSERT INTO users (username, email, passwd ) VALUES ('$name', '$email', '$password')";
            $connection =  mysqli_connect('localhost', 'mlejnek', 'Heslo', '6ep_mlejnek');
            $query = mysqli_query($connection, $sqlQuery);
           
            header('location: posts.php');
            return;
        }
        else{
            header('location: login.html');
            return;
        }
    }
}

header('location: register.html');
?>