<?php
require "connexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $std = isset($_POST['std']) ? $_POST['std'] : [];
    $check = isset($_POST['check']) ? $_POST['check'] : [];
    $Period = $_POST["Period"];
    $id_bus = $_POST["id_bus"];

    foreach ($std as $student_id) {
        if ($Period == 'Entrée_matin') {
            $qurty = $con->prepare("SELECT * FROM absence WHERE IDétudient = :student_id AND IDbus = :id_bus AND Date_Absence = CURDATE()");
            $qurty->bindParam(':student_id', $student_id, PDO::PARAM_INT);
            $qurty->bindParam(':id_bus', $id_bus, PDO::PARAM_INT);
            $qurty->execute();
            $count = $qurty->rowCount();

            if ($count == 0) {
                if (in_array($student_id, $check)) {
                    $req = "INSERT INTO absence (Entrée_matin, IDétudient, IDbus) VALUES ('غائب', :student_id, :id_bus)";
                    $stmt = $con->prepare($req);
                    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
                    $stmt->bindParam(':id_bus', $id_bus, PDO::PARAM_INT);
                    $stmt->execute();  
                } else {
                    $req = "INSERT INTO absence (IDétudient, IDbus) VALUES (:student_id, :id_bus)";
                    $stmt = $con->prepare($req);
                    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
                    $stmt->bindParam(':id_bus', $id_bus, PDO::PARAM_INT);
                    $stmt->execute();
                }
            } else {
                if (in_array($student_id, $check)) {
                    $req = "UPDATE absence SET $Period='غائب' WHERE IDétudient=:student_id AND IDbus=:id_bus AND Date_Absence=CURDATE()";
                    $stmt = $con->prepare($req);
                    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
                    $stmt->bindParam(':id_bus', $id_bus, PDO::PARAM_INT);
                    $stmt->execute();  
                } else {
                    $req = "UPDATE absence SET $Period='حاضر' WHERE IDétudient=:student_id AND IDbus=:id_bus AND Date_Absence=CURDATE()";
                    $stmt = $con->prepare($req);
                    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
                    $stmt->bindParam(':id_bus', $id_bus, PDO::PARAM_INT);
                    $stmt->execute();
                }
            }
        } else {
            if (in_array($student_id, $check)) {
                $sql_update = "UPDATE absence SET $Period='غائب' WHERE IDétudient=:student_id AND IDbus=:id_bus AND Date_Absence=CURDATE()";
                $stmt_update = $con->prepare($sql_update);
                $stmt_update->bindParam(':student_id', $student_id, PDO::PARAM_INT);
                $stmt_update->bindParam(':id_bus', $id_bus, PDO::PARAM_INT);
                $stmt_update->execute();
            }else {
                $req = "UPDATE absence SET $Period='حاضر' WHERE IDétudient=:student_id AND IDbus=:id_bus AND Date_Absence=CURDATE()";
                $stmt = $con->prepare($req);
                $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
                $stmt->bindParam(':id_bus', $id_bus, PDO::PARAM_INT);
                $stmt->execute();
            }
        }
    }
    echo "Success";
}
?>
