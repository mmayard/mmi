<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/stylescv.css">
      <link href="
https://fonts.googleapis.com/css?family=Ubuntu
" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
      
   <title>Your profile</title>
   </head>

   <!-- -------------------------------PHP------------------------------- -->
   <body>

<?php
include('objects/users.php');
    $email = $_GET['email'];

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
    	$sql = "SELECT prenom, nom, localisation, telephone, email, bio, play, lien, toptrack, favartist, website FROM playlist WHERE email= '$email'"; //order by > 
    	$playlist = $conn ->query($sql);

    if ($playlist->num_rows >0){ 



      while($row = $playlist->fetch_assoc() ){ // iteration de la liste sur chaque ligne 
        

         $playlist= new User();
        
         $playlist->prenom = $row['prenom']; 
         $playlist->nom = $row['nom'];
         $playlist->email = $row['email'];
         $playlist->bio = $row['bio'];
         $playlist->localisation = $row['localisation'];
          $playlist->telephone = $row['telephone'];
          $playlist->play = $row['play']; 
          $playlist->lien = $row['lien']; 
          $playlist->favartist = $row['favartist'];
          $playlist->toptrack = $row['toptrack'];
          $playlist->website = $row['website'];
  
        


 //        //echo 'html' > afficher pour chaque ligne de la base de données 
 //        // .$row ['nom de la variable a recuperer'] - information dynamique 
        echo '


          <div class="project">
          <h2 class="sign" >Personal info</h2>
          <h1 class="years">'.$playlist->prenom.'</h1>
          <h4 class="years">.'.$playlist->nom.'</h4>
          <p class="texte-courant">'.$playlist->bio.'</p>
          <p class="texte-courant">'.$playlist->localisation.'</p>
        
          <h4 class="email">'.$playlist->email.'</h4>
          <h4 class="telephone">'.$playlist->telephone.'</p>

         <h4 class="website">'.$playlist->website.'</h4>
          

          <div class="project" >
          <h2 class="favartist">'.$playlist->favartist.'</h4>
          </div>

          <div class="project" >
         <h2 class="play">'.$playlist->play.'</p>
                <iframe class="top">'.$playlist->toplien.'</h4>
          </div>

                    <div class="project" >
          <h2 class="favartist">'.$playlist->toptrack.'</h4>
          </div>

       </div>';

	 }
	}
     else{
       echo "No data";
     }
    }


    //requete sql - SELECT > recuperation des données 
    

    
 //     //apparition des données par ordre decroissant
    


?> 



   </body>
</html>