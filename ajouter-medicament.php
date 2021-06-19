<?php 
session_start();
if(isset($_SESSION["user"])){
  if($_SESSION["user"]->role==="secretaire"){

echo'

<!DOCTYPE html>
<head>
    <meta name=viewport content="width=device-width , initiale-scale=1,maximum-scale=1">
    <meta charset="utf-8"> 
    <link rel=stylesheet href="https://maxst.icon8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <link rel=stylesheet href="http://localhost/atelier/fontawesome/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="patient.css"/>

    <title> Cabinet Boukerrou </title>
</head>

<body>
    ><input type="checkbox" id="nav-toggle">
<div class="sidebar">
          <div class="sidebar-brand">
          <h2>  <span> <i class="fas fa-laptop-medical"></i>  </span>  <span> Cabinet Boukerrou </span>       </h2>
         </div>

         <div class="sidebar-menu">
                <nav>

    <ul>

          <li><a href="http://localhost/atelier/sec/dash.php" class=active > <span class="las la-igloo">  </span> <span> Accueil </span> </a> </li>

          <li>
          <a href="http://localhost/atelier/sec/liste-patient.php"><span class="fas fa-user-injured">  </span> <span>Patients </span> </a>
          <ul class="submenu"><li><a href="http://localhost/atelier/sec/ajouter-patient.php">ajouter un patient </a></li> <li><a href="http://localhost/atelier/sec/modifier-patient.php#">modifier un patient</a></li> </ul> 
          </li>

          <li>
          <a href="http://localhost/atelier/sec/liste-rdv.php"><span class="far fa-calendar-alt">  </span> <span>Agenda des rendez-vous </span> </a>
          <ul class="submenu"><li><a href="http://localhost/atelier/sec/ajouter-rdv.php">ajouter un rendez-vous </a></li> </li><li><a href="http://localhost/atelier/sec/modifier-rdv.php">modifier un rendez-vous</a></li> </ul>
          </li>

          <li>
          <a href="http://localhost/atelier/sec/liste-medicament.php"><span class="fas fa-capsules">   </span> <span>Médicaments</span> </a>
          <ul class="submenu"><li><a href="http://localhost/atelier/sec/ajouter-medicament.php">ajouter un médicament </a></li>  </ul>
          </li>

          


     </ul>
               </nav>
         </div>

</div>
<div class="main-content">
      <header>
             
               <h2>
                    <label for="nav-toggle"> 
                    <span class="las la-bars"> </span>
                    </label>
                    Ajouter un médicament 

               </h2> 
             <div class="search-wrapper">
                   <span class="las la-search"> </span>   
                   <input type="search" placeholder="recherchez ici "/>
             </div>
             <div class="user-wrapper">
                  <img src="doclogo2.jpg" width="40px" height="40px" alt="docteur" />

                  <div>

                  <h4> Médecin </h4>
                  <small> sara.sousou@gmail.com </small>

            
                  </div>
             
             </div>
             
      </header>

      <main> 
               <div class="dashboard-cards">
                     <div class="card-single">
                            <div> <a href="http://localhost/atelier/sec/liste-patient.php">
                                  <h4> </h4>
                                  <span> Patients </span>
                                  </a>
                            </div>

                            <div>
                                 <span class="fas fa-user-injured">
                            </div>
                     
                     </div>

                     <div class="card-single">
                            <div> <a href="http://localhost/atelier/sec/liste-rdv.php">
                                  <h4>  </h4>
                                  <span> Agenda </span>
                                  </a>
                            </div>
                            
                            <div>
                                 <span class="far fa-calendar-alt">
                            </div>
                     
                     </div>

                     <div class="card-single">
                            <div><a href="http://localhost/atelier/sec/liste-medicament.php">
                                  <h4>  </h4>
                                  <span> Médicaments </span>
                                  </a>
                            </div>
                            
                            <div>
                                 <span class="fas fa-capsules">
                            </div>
                     
                     </div>

                     
               
               </div>

               <div class="recent-grid">
                         <div class="content">
                             <form  method="post">
                             <div class="user-details">
              
                                     <div class="input-box">
                                        <span class="details" >Nom Commerciale</span>
                                        <input type="text" placeholder="Entrer le Nom Commerciale" name="nomcom" required>
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Nom Scientifique</span>
                                        <input type="text" placeholder="Entrer le Nom Scientifique" name="nomsc" required>
                                    </div> 


                           <div class="button">
                           <input type="submit" value="Ajouter" name="submit">
                           </div>
                      </div>
                      </form>
                  </div>
            </div>

         </div>

      </main>

</div>';



if (isset($_POST["submit"])){

$username ="root";

$password ="";

$database =new PDO("mysql:host=localhost; dbname=dbcabinet",$username,$password);



 

  $nomcom= htmlspecialchars($_POST["nomcom"]);

  $nomsc=htmlspecialchars($_POST["nomsc"]);




 $ad = $database->prepare("INSERT INTO medicament (nomsc,nomcom) VALUES(:nomsc,:nomcom)");
 $ad->bindParam(":nomsc",$nomsc);

 $ad->bindParam(":nomcom",$nomcom);

 

 $ad->execute();
 echo'<script> alert(" Médicament ajoutée ") </script>';

}}}
else{ header("location:http://localhost/atelier/login/login.php");}
?>

