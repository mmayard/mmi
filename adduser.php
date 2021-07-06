<?php

include('objects/users.php');
//definir la fonction > méthode POST -> déclencher par le bouton "submit" defini dans html
 
//si je reçois un post du bouton 'submit'
if(isset($_POST['submit'])){ 
    
    // j'execute l'algorithme qui ramene les valeurs des champs input saisis
    
    $playlist = new User();
    // déclaration des variables 
        //valeur entre [] correspond au name="" du html
    $playlist ->prenom = $_POST['prenom'];
    $playlist ->nom = $_POST['nom'];
    $playlist ->mail = $_POST['mail'];
    $playlist ->telephone = $_POST['telephone'];
    $playlist ->play = $_POST['play'];

    // paramètres base de données 
    $servername = "localhost";
    $username="root";
    $password="root";
    $dbname="onda";

    //établir la connexion avec la base de données 
    $conn = new mysqli($servername,$username,$password,$dbname);

    //valider la connexion 
    if($conn->connect_error){
        echo'probleme de connexion à la base de données. <br/>';
    }
    else{
        echo 'connecté <br/>';
    }

    //construire la requete - INSERT INTO > ajouter des données 
    $sql = "INSERT INTO playlist(prenom, nom, email, telephone, play) VALUES ('$playlist ->prenom', '$playlist ->nom', '$playlist-> mail, '$playlist->telephone')";

    echo $sql;

    //executer la requete 
    // si ma requete a bien été exécutée
    if($conn->query($sql)===TRUE){
        header("cards/userslist.php");
    }
    else{
        echo $conn->error;
    }

    $conn->close();

}


?>