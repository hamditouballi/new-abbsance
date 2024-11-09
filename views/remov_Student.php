<?php
// include "connexion.php";
// if (!empty($_GET["id"])) {
//     $query= "DELETE FROM etudient WHERE ID_étudient=:id";
//     $objstmt=$con->prepare($query);
//     $objstmt->execute([":id"=>$_GET["id"]]);
//     $objstmt->closeCursor();
//     header("location:../controlers/managementStudent.php");
// }


// include "connexion.php";
// if (!empty($_GET["id"])) {
//     try {
//         $query = "DELETE FROM etudient WHERE ID_étudient = :id";
//         $stmt = $con->prepare($query);
//         $stmt->execute([":id" => $_GET["id"]]);
//         header("location:../controlers/managementStudent.php");
//     } catch (PDOException $e) {
//         // Handle the exception (e.g., show an error message)
//         echo "Error deleting student: " . $e->getMessage();
//     }
// }



include "connexion.php";
if (!empty($_GET["id"])) {
    try {
        // Delete related records in the 'absence' table first
        $deleteAbsenceQuery = "DELETE FROM absence WHERE IDétudient = :id";
        $deleteAbsenceStmt = $con->prepare($deleteAbsenceQuery);
        $deleteAbsenceStmt->execute([":id" => $_GET["id"]]);
        
        // Then, delete the student record from the 'etudient' table
        $deleteEtudientQuery = "DELETE FROM etudient WHERE ID_étudient = :id";
        $deleteEtudientStmt = $con->prepare($deleteEtudientQuery);
        $deleteEtudientStmt->execute([":id" => $_GET["id"]]);
        
        header("location:../controlers/managementStudent.php");
    } catch (PDOException $e) {
        // Handle the exception (e.g., show an error message)
        echo "Error deleting student: " . $e->getMessage();
    }
}




?>