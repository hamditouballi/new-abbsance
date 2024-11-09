<?php
require "../views/login.php";
require "../Modeles/CRUD.php";
session_start();
$c=new crud();
if(isset($_POST["loginbtn"])){
    $log=$_POST["userad"];
    $pwd=$_POST["pwdad"];
    $data=$c->responsable_des_transports($log,$pwd);
    if($data !=null){
        $_SESSION["user"]=$data;
        header("location:../controlers/managementDrivers.php");
    }else{
        echo "<script> alert('البيانات التي تم إدخالها غير صالحة');</script>";
    }
}
if(isset($_POST["sign"])){
    $log=$_POST["userT"];
    $pwd=$_POST["pwdT"];
    $data=$c->responsable_du_bus_scolaire($log,$pwd);
    if($data !=null){
        $_SESSION["user"]=$data;
        header("location:../controlers/managementAbbsance.php");
    }else{
        echo "<script> alert('البيانات التي تم إدخالها غير صالحة');</script>";
    }
}