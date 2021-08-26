<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=='POST'){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $user_name=$_POST['user_name'];
    $user_password=$_POST['password'];
    $confirm_password=$_POST['password_repeat'];
    $email=$_POST['email'];
    $user_contact=$_POST['phone_number'];
    $image=$_FILES["image"];
    if(!is_dir("images")){
        mkdir("images");
    }
    $image=$_FILES['image'] ?? null;
    if($image && $image["tmp_name"]){
        $image_path="images/".bin2hex(random_bytes(8))."/".$image["name"];
        mkdir(dirname($image_path));
        move_uploaded_file($image["tmp_name"],$image_path);
    }
    require_once "../database/dbh.inc.php";
    if(empty($first_name) || empty($last_name) || empty($user_name) || empty($user_password) || empty($confirm_password) || empty($email) || empty($user_contact)){
        header('Location: ../public/register.php?error=emptyinputs');
        exit;
    }
    if(!preg_match(("/^[a-zA-Z0-9]*$/"),$user_name)){
        header('Location: ../public/register.php?error=invalidusername');
        exit;
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header('Location: ../public/register.php?error=invalidemail');
        exit;
    }
    if($user_password!==$confirm_password){
        header('Location: ../public/register.php?error=passwordonotmatch');
        exit;
    }
    function usernameexist($pdo,$user_name,$email){
        $statement=$pdo->prepare("SELECT * FROM users WHERE user_name=:username OR email = :email");
        $statement->bindValue(":username",$user_name);
        $statement->bindValue(":email",$email);
        $statement->execute();
        $resultdata=$statement->fetchAll(PDO::FETCH_ASSOC);
        if($resultdata){
            $result=true;
            return $result;
        }
        else{
            $result=false;
            return $result;
        }   
    }
    
    if((usernameexist($pdo,$user_name,$email))==true){
        header('Location: ../public/register.php?error=userexists');
        exit;
    }
    $statement=$pdo->prepare("INSERT INTO users (user_name,first_name,last_name,email,password,user_image,phone_number,date_created) VALUES(:username,:firstname,:lastname,:email,:password,:userimage,:phone,:date_created)");
    $hashedpwd=password_hash($user_password,PASSWORD_DEFAULT);
    $statement->bindValue(":username",$user_name);
    $statement->bindValue(":firstname",$first_name);
    $statement->bindValue(":lastname",$last_name);
    $statement->bindValue(":email",$email);
    $statement->bindValue(":password",$hashedpwd);
    $statement->bindValue(":date_created",date('Y-m-d H:i:s'));
    $statement->bindValue(":phone",$user_contact);
    $statement->bindValue(":userimage",$image_path);
    $statement->execute();
    $lastId = $pdo->lastInsertId();
    $_SESSION["lastid"]=$lastId;
    header('Location: ../public/member.php');
    exit;
}


else{
    header('Location: ../public/index.php');
}


?>