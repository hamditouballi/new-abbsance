<?php
// include "connexion.php";
// if (!empty($_GET["id"])) {
//     $query= "DELETE FROM responsable_du_bus_scolaire WHERE ID_chauffeur=:id";
//     $objstmt=$con->prepare($query);
//     $objstmt->execute([":id"=>$_GET["id"]]);
//     $objstmt->closeCursor();
//     header("location:../controlers/managementDrivers.php");
// }
?>


<?php
include "connexion.php";

if (!empty($_GET["id"])) {
    $con->beginTransaction();

    try {
        // Set the IdChauffeur in bus_scolaire to NULL or another valid value
        $updateQuery = "UPDATE bus_scolaire SET IdChauffeur = NULL WHERE IdChauffeur = :id";
        $updateStmt = $con->prepare($updateQuery);
        $updateStmt->execute([":id" => $_GET["id"]]);

        // Delete the driver from responsable_du_bus_scolaire table
        $deleteQuery = "DELETE FROM responsable_du_bus_scolaire WHERE ID_chauffeur = :id";
        $deleteStmt = $con->prepare($deleteQuery);
        $deleteStmt->execute([":id" => $_GET["id"]]);

        $con->commit();

        header("Location: ../controlers/managementDrivers.php");
        exit();
    } catch (PDOException $e) {
        $con->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
?>