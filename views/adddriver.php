<?php
    require "connexion.php";
    if(isset($_POST["ajout"])){
        $nom = $_POST["nom"];
        $user = $_POST["user"];
        $pwd = $_POST["pwd"];
        $req = "INSERT INTO responsable_du_bus_scolaire(nom_chauffeur, User_C, PWD_C) VALUES('$nom', '$user', '$pwd')";
        $con->query($req);
        header("location:../controlers/managementDrivers.php");
    }
?>