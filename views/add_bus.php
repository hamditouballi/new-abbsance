<?php
    require "connexion.php";
    if(isset($_POST["ajout"])){
        $Nbus = $_POST["Nbus"];
        $IdChauffeur = $_POST["IdChauffeur"];
        $req = "INSERT INTO bus_scolaire(Numéro_de_bus, IdChauffeur) VALUES('$Nbus', '$IdChauffeur')";
        $con->query($req);
        header("location:../controlers/managementBuses.php");
    }
?>