<?php
require "connexion.php";
if (isset($_POST["editabb"])) {
  $ID_Absence = $_POST["ID_Absence"];
  $entrerM = $_POST["entrerM"];
  $sortirM = $_POST["sortirM"];
  $entrerS = $_POST["entrerS"];
  $sortirS = $_POST["sortirS"];
  $req = $con->prepare("UPDATE `absence` SET `Entrée_matin`=?, `Sortie_matin`=?, `Entrée_soir`=?, `Sortie_soir`=? WHERE ID_Absence=?");
  $req->execute([$entrerM, $sortirM, $entrerS, $sortirS, $ID_Absence]);
  header("location:../controlers/management_abbsanceAdmin.php");
}
?>