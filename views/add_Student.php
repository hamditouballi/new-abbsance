<?php
    require "connexion.php";
    if(isset($_POST["ajout"])){
        $nom = $_POST["nomS"];
        $niveau = $_POST["niveauS"];
        $IDbus = $_POST["IDbus"];
        $req = "INSERT INTO etudient(Nom_complet, niveau_étude, IdBus) VALUES('$nom', '$niveau', '$IDbus')";
        $con->query($req);
        header("location:../controlers/managementStudent.php");
    }
?>