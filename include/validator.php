<?php
require "./database.php";
//  Login
if(isset($_POST['login'])){
    $login = new Login($_POST['username'], $_POST['password']);
    if($login->login() == "logged in"){
        header("Location: ./../Home");
    }else{
        header("Location: ./../Login");
    }
}
//  Sign up
if(isset($_POST['signup'])){
    $pwd = $_POST['password'];
    $confirm = $_POST['confirm'];
    if($pwd == $confirm){
        $sign = new Signup();
        $up = $sign->signup($_POST['fullname'], $_POST['email'], $_POST['username'], $pwd);
        if($up){
            header("Location: ./../Home");
        }else{
            setcookie("userexists", true, time()+15, "/");
            header("Location: ./../Signup");
        }
    }else{
        setcookie("password", "do not match", time()+15, "/");
        header("Location: ./../Signup");
    }
}
//  Post
if(isset($_POST['post'])){
    $title = $_POST['title'];
    $desc = $_POST['desc'];

    $images = $_FILES['images']['name'];
    $image_tmps = $_FILES['images']['tmp_name'];
    $store_image = "";
    foreach($images as $image){
        $store_image .= $image.",";
    }
    $c = 0;
    foreach($image_tmps as $tmps){
        copy($tmps, "./../src/images/Posts/".$images[$c]);
        $c++;
    }
    $sending = new Post();
    $sending->Post($title, $desc, $store_image);
    header("Location: ./../Post");
}
//  Contact
if(isset($_POST['contact'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    setcookie("mail", "sent", time()+15, "/");
    mail('kado_admin@kadomn.org', $email, "$name has sent you an email\n\nMessage:\n\n$subject");
    header("Location: ./../Contact");
}
//  Logout
if(isset($_REQUEST['logout'])){
    try{
        session_start();
        session_unset();
        session_destroy();
    }catch(Exception $e){
    }finally{
        header("Location: ./Home");
    }
}