<?php

//definir la fonction > méthode POST -> déclencher par le bouton "submit" defini dans html
 
//si je reçois un post du bouton 'submit'
if(isset($_POST['submit'])){ 
    
    // j'execute l'algorithme qui ramene les valeurs des champs input saisis
    
    // déclaration des variables 
        //valeur entre [] correspond au name="" du html
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $localisation = $_POST['localisation'];
    $phonenumber = $_POST['phonenumber'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $play = $_POST['play'];
    $lien = $_POST['lien'];
    $toptrack = $_POST['toptrack'];
    $favartist = $_POST['favartist'];
    $website = $_POST['website'];
   


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
    $sql = "INSERT INTO playlist(prenom, nom, localisation, telephone, email, bio, play, lien, toptrack, favartist, website) VALUES ('$prenom', '$nom', '$localisation', '$telephone','$email','$bio','$play','$lien','$toptrack','$favartist','$website')";

    echo $sql;

    //executer la requete 
    // si ma requete a bien été exécutée
    if($conn->query($sql)===TRUE){
        header("location: register.php?email=$email");
    }
    else{
        echo $conn->error;
    }

    $conn->close();

}


?>