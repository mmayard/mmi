<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
     <link rel="shortcut icon" href="img/favicon.png">

      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="css/style.css">

       <script src="js/p5.js"></script>
    <script src="js/p5.sound.min.js"></script>
    <script src="js/sketch5.js"></script>

      <title>Bienvenue</title>
   </head>
   <body>
    <nav class="navbar">
        <div class="container">
            <div class="navbar-logo">
                  <a href="index.html"><img src="img/logo.png" width="55" height="25"></a>
            </div>

            <div class="navbar-menu">
                <a class="navbar-item" href="projects.html">
                    LES ONDES
                </a>
               <a class="navbar-item" href="onda.html">
                    ABOUT 
                </a>
                <a class="navbar-item" href="signin.php">
                    SIGN IN
                </a>
                <a class="navbar-item" href="contact.html">
                    Contact
                </a>
            </div>

        </div>
    </nav>
     <div id='myContainer'>
        
    </div>
      <div class="section">
        
         <h2 class="sign" >Welcome to onda experience</h2>
         <hr>
         <div class="columns">
        <div class="column">
         <p> Onda est une communauté autour de l'onde et de la musique ambiante prend forme. Rejoignez la communauté "onda" est faite vivre la musique ambiente en partageant vos artistes, tracks et playlists préférées ! </p>

<p class="small">Nous parlons d'ondes, les tibétains disent "envoyer un message sur le vent". Duuu : Radio Bonaventure #1 </p>
</div>


<div class="column">
         <!--login form begin-->
         <form class="signin" method="POST" action="signin.php" > <!--Choix de la méthode et selection de l'action (requete au serveur)-->
            <input class="mail" type="text"  name="email" placeholder="e-mail"/> <!--name="clé" attention à la nomenclature-->
            <input id=submit class="button2" type="submit"  name="submit" value="submit"/>
         </form>  
        
    </div>
    </div>
      <?php
         if(isset($_POST['submit'])) {

             $email=$_POST['email'];
             $servername = "localhost";
             $username="root";
             $password="root";
             $dbname="onda";
             $conn = new mysqli($servername,$username,$password,$dbname);
             $sql = "SELECT email FROM playlist WHERE email = '".$email."'";
             $listEmail = $conn->query($sql);
             if($listEmail->num_rows==1)

               {
                  header("location:profile.php?email=".$email);
               }

               else {
                  header("location:register.html");
               }

               $conn->close();
               }
               ?>
               <br>
               <br>
               <br>
               <br>
               <footer class="footer">
        <div class="container">
            <div class="columns">
                <div class="column">
                    
             

                <div class="column">
                        MARVIN MAYARD
                    </div>
                <div class="small">
                    <ul>
                        <li>
                            <a href="mailto:nom.prenom@exemple.com">
                                marvin.mayard@gmail.com
                            </a>
                        </li>
                         <li>
                            <a href="marvinmayard.com">
                                marvinmayard.com
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
   </body>
</html>