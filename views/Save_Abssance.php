<?php
require "connexion.php";
session_start();

if (isset($_POST['add'])) {
    $absent_students = $_POST['absent'];
    $id_bus = $_POST["id_bus"];

    foreach ($absent_students as $student_id => $value) {
    
         if($_POST['Period'] == 'Entrée_matin'){
         
                    $req="INSERT INTO absence ( Entrée_matin, IDétudient, IDbus) VALUES ('غائب','$student_id','$id_bus');";
                    $stmt = $con->prepare($req);
        }else {
              
                $sql_update = "UPDATE absence SET $_POST[Period]='غائب' WHERE IDétudient='$student_id' and IDbus='$id_bus' and Date_Absence=CURDATE();";
                $stmt_update = $con->prepare($sql_update);
              
        }
        
        
    }
}
    header("Location: ../controlers/managementRecord.php"); 
    exit();

?>