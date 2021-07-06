<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
    body {
      background-color: #F3EBF6;
      font-family: 'Open Sans', sans-serif;
      }

      .card {
        background-color: #FFFFFF;
        width: 400px;
        height: 500px;
        margin: 7em auto;
        border-radius: 1.5em;
        }

      .profile {
        color: lightgreen;
        padding-top: 10px;
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
        font-size: 14px;
        text-align: center;
        }

      p {
          color: rgb(38, 50, 56);
          font-weight: lighter;
        }

      img {
        margin-top: 30px;
        width: 20%;
        border-radius: 40px;
        }

    </style>

    <title>User card</title>

</head>


<body>

<?php

  include('../objects/users.php');

    //connection a la base de données 
    $servername = "localhost";
    $username="root";
    $password="root";
    $dbname="onda";
    $conn = new mysqli($servername,$username,$password,$dbname);
    
    //verification de la connection 
    if($conn->connect_error){
      echo'Erreur de connexion à la base de données. <br/>';
    }
    else{
        echo 'connecté <br/>';
    }

    //requete sql - SELECT > recuperation des données 
    $sql = "SELECT prenom, nom,mail,telephone, play FROM playlist ORDER BY id desc"; //order by > apparition des données par ordre decroissant
    $listeUsers = $conn ->query($sql);

    if ($listeUsers->num_rows >0){ 

    

      while($row = $listeUsers->fetch_assoc() ){  // iteration de la liste sur chaque ligne 
        
        $playlist = new User();

        $playlist ->prenom = ['prenom'];
        $playlist ->nom = $_POST['nom'];
        $playlist ->mail = $_POST['email'];
        $playlist ->telephone = $_POST['telephone'];
        $playlist ->localisation = $_POST['localisation'];
        $playlist ->bio = $_POST['bio'];
        $playlist ->playlist = $_POST['playlist'];
        $playlist ->lien = $_POST['lien'];
        $playlist ->toptrack = $_POST['toptrack'];
        $playlist ->favartist = $_POST['favartist'];
        $playlist ->website = $_POST['website'];





// un objet, une liste de propriété qui les définissent

        //echo 'html' > afficher une carte etudiante pour chaque ligne de la base de données 
        // .$row ['nom de la variable a recuperer'] - information dynamique 
        echo'

        <div class="card" id="card">
      
        <div class="profile">
        
          <div class="icon">
          <i class="avatar">
            <img src="avatar.svg" alt="">
          </i>
        </div>
  
  
        <div class="nom"> 
          <h1 class="champ">Name</h1>
          <p class="name">'.$playlist->prenom.' '. $playlist->nom.'</p> 
        </div>
        
        <div class="email"> 
          <h1 class="champ">Email adress</h1>
          <p class="mail">'.$playlist->mail.'</p>
        </div>
  
        <div class="numtel"> 
          <h1 class="champ">Phone number</h1>
          <p class="phone">'.$playlist->telephone.'</p>
        </div>
        
        <div class="groupes"> 
          <h1 class="champ">Group</h1>
          <p class="group">'.$playlist->play.'</p>
        </div>
      </div>
  
      </div>
        
      ';

      } 

    }

    else{
      echo "Pas d'etudiant dans la liste";
    }
      

?>

    
    
</body>
</html>