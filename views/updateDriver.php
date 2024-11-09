<?php
require "connexion.php";
if (isset($_POST["edit"])) {
  $id = $_POST["ID_driver"];
  $nameD = $_POST["nameD"];
  $userD = $_POST["userD"];
  $pwdD = $_POST["pwdD"];
  $req = $con->prepare("UPDATE `responsable_du_bus_scolaire` SET `nom_chauffeur`=?, `User_C`=?, `PWD_C`=? WHERE ID_chauffeur=?");
  $req->execute([$nameD, $userD, $pwdD, $id]);
  header("location:../controlers/managementDrivers.php");
}
?>