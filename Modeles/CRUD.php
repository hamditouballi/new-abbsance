<?php
class crud{
    function getConnection(){
        $host="localhost";
        $base="absence";
        $user="root";
        $pwd="";
        try {
            $con=new PDO("mysql:host=$host;dbname=$base",$user,$pwd);
            return $con;
            
        } catch (PDOException $e) {
            echo "Probleme de Connexion".$e->getMessage();
            return null;
        }
    }
    function responsable_des_transports($l,$p){
        $con=$this->getConnection();
        $req="select * from responsable_des_transports where User_R='$l' and PWD_R='$p'";
        $res=$con->query($req);
        if($res->rowCount()>0){
            if($donnee=$res->fetch()){
                $login=$donnee["User_R"];
                return $login;
            }                                                
        }
        return null;
    }
    function responsable_du_bus_scolaire($l,$p){
        $con=$this->getConnection();
        $req="select * from responsable_du_bus_scolaire where User_C='$l' and PWD_C='$p'";
        $res=$con->query($req);
        if($res->rowCount()>0){
            if($donnee=$res->fetch()){
                $login=$donnee["User_C"];
                return $login;
            }                                                
        }
        return null;
    }
}