<?php
require "connexion.php";
if (isset($_POST["edit"])) {
  $id = $_POST["ID_bus"];
  $number = $_POST["number"];
  $nameDriver_id = $_POST["nameDriver_id"];
  $req = $con->prepare("UPDATE `bus_scolaire` SET `Numéro_de_bus`=?, `IdChauffeur`=? WHERE ID_bus=?");
  $req->execute([$number, $nameDriver_id, $id]);
  header("location:../controlers/managementBuses.php");
}
?>