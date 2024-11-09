<?php
require "connexion.php";
if (isset($_POST["edit"])) {
  $id = $_POST["ID_Student"];
  $name_S = $_POST["name_S"];
  $niveau_S = $_POST["niveau_S"];
  $number_Bus = $_POST["number_Bus"];
  $req = $con->prepare("UPDATE `etudient` SET `Nom_complet`=?, `niveau_étude`=?, `IdBus`=? WHERE ID_étudient=?");
  $req->execute([$name_S, $niveau_S, $number_Bus, $id]);
  header("location:../controlers/managementStudent.php");
}
?>