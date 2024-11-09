<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/csslogin/csslogin.css">
	<link rel="website icon" type="png" href="../views/csslogin/305219633_540712911186499_9137420916457086341_n.jpg">
    
    <title>المركب التربوي الأمين</title>
</head>
<body style="background-color: #f4f4f4;">
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="" method="post">
			<h1>مسؤول الحافلة</h1>
			<input type="text" placeholder="اسم المستخدم" name="userT"/>
			<input type="password" placeholder="كلمة المرور" name="pwdT"/>
			<button name="sign">تسجيل</button>
        </form>
	</div>
	<div class="form-container sign-in-container">
		<form action="" method="post">
			<h1>مسؤول النقل</h1>
			
			
			<input type="text" placeholder="اسم المستخدم" name="userad" />
			<input type="password" placeholder="كلمة المرور" name="pwdad" />
			
			<button name="loginbtn">تسجيل الدخول</button>
        </form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>مسؤول النقل المدرسي</h1>
				<button class="ghost" id="signIn">تسجيل</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>مسؤول الحافلة المدرسية</h1>
				<button class="ghost" id="signUp">تسجيل</button>
			</div>
		</div>
	</div>
</div>

<?php
// require "connexion.php";
// session_start();
// if(isset($_POST["sign"])){
//     $T=0;
//     $userT=$_POST["userT"];
//     $pwdT=$_POST["pwdT"];
//     $req="select * from responsable_du_bus_scolaire";
//     $res=$con->query($req);
    

//     foreach ($res->fetchAll() as $v) {
//         if($userT === $v["User_C"] && $pwdT === $v["PWD_C"]){
//             $T++;
            
//         }
//     }
//     if($T>=1){
//         header("location:produits.php");
//         $_SESSION["User_C"]= $userT;
//         $_SESSION["PWD_C"]= $pwdT;
//     }
// }
// if(isset($_POST["loginbtn"])){
//     $c=0;
//     $userad=$_POST["userad"];
//     $pwdad=$_POST["pwdad"];
//     $req="select * from responsable_des_transports";
//     $res=$con->query($req);
    

//     foreach ($res->fetchAll() as $v) {
//         if($userad === $v["User_R"] && $pwdad === $v["PWD_R"]){
//             $c++;
            
//         }
//     }
//     if($c>=1){
//         header("location:admin.php");
//         $_SESSION["User_R"]= $userad;
//         $_SESSION["PWD_R"]= $pwdad;
//     }
// }
?>



<script src="../views/jslogin/jslogin.js"></script>
</body>
</html>
