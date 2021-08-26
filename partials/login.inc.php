<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once "../database/dbh.inc.php";
    $user_name=$_POST['username'];
    $input_password=$_POST['password'];

    if(empty($user_name) || empty($input_password)){
        header('Location: ../public/login.php?error=emptyinputs');
        exit;
    }
    $statement=$pdo->prepare("SELECT * FROM users WHERE user_name=:username OR email=:username");
    $statement->bindValue(":username",$user_name);
    $statement->execute();
    $resultdata=$statement->fetch(PDO::FETCH_ASSOC);

    $password_hashed=$resultdata['password'];
    if(password_verify($input_password,$password_hashed)){
        if($resultdata['user_type']=='0'){
            session_start();
            $_SESSION['id']=$resultdata['id'];
            $_SESSION['user_type']=$resultdata['user_type'];
            header('Location: ../admin/index.php');
            exit;
        }
        if($resultdata['user_type']=='1'){
            session_start();
            $_SESSION['id']=$resultdata['id'];
            $_SESSION['user_name']=$resultdata['user_name'];
            header('Location: ../users/index.php');
            exit;                   
        }
        else{
            exit;
        }
    }
    else{
        header('Location: ../public/login.php?error=wrongpwd');
        exit;  
    }
}

else{
    header("Location: ../public/login.php");
    exit();
}


?>