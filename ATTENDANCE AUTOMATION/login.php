<?php
$invalid =";
$e = false;
$v = false;
$valU =";
session_start();
if($_SERVER["REQUEST_METHOD"]== "POST"){
    include',/dbconnect.php';
    $userid =$_POST["userid"];
    $password = $_POST["password"];
    $ValU = trim($_POST['userid']);
    if($userid == ""or $password == ""){
        $v = true;
    // echo "enter an valid value";
    }
    else{
        $e =true;
    }
    $sql1 ="SELECT*FROM'login_student' WHERE'usn'='$userid'AND 'password'='$password';";
    $sql2 ="SELECT*FROM'login_faculty' WHERE'f_id'='$userid'AND 'password'='$password';";
    $sql3 ="SELECT*FROM'login_admin' WHERE'ad_min'='$userid'AND'password'= $password';";
    }


