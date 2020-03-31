<?php
if(isset($_POST['name']) && isset($_POST['password'])){

    if(!empty($_POST['name'])  && !empty($_POST['password'])){
        $name  = $_POST['name'];
        $password  = $_POST['password'];
       
        $connection =  mysqli_connect('localhost', 'mlejnek', 'Heslo', '6ep_mlejnek');
        $sqlQuery = "SELECT * FROM users WHERE username='$name'";
        $query = mysqli_query($connection, $sqlQuery);
        
        $userFormDB = mysqli_fetch_assoc($query);
      
        if($userFormDB){
            if(password_verify($password,$userFormDB['passwd'] )){
                session_start();
                $_SESSION['name'] = $name;
                header('location: posts.php');
                return;
            }   
        }
        header('location: login.html');
        return;
    }
}

header('location: login.html');
?>