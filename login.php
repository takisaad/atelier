<!Doctype html>
<head> 
<link rel=stylesheet href="fontawesome/css/all.min.css"/>
<link rel="stylesheet" type="text/css" href="login.css"/>
<meta name=viewport content="width=device-width , initiale-scale=1">
 <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class=container >  

         <div>
		 <img src="dc.png" class=img/>
		 </div>

  

         <div class=loginbox >
		              <img src=loglog.jpeg class=doclogo2 /> 
		              <div class=header >
	                      
                          <h5> connectez-vous pour continuer </h5>
						
		              </div>
		 
                     <div class=main>
					        
		                    <form method="POST" >
		                          <span>
		                              <i class="fas fa-user-md"></i>
							          <input type="text" placeholder="Nom d'utilisateur" name="email" required/>
		                          </span><br>
						          <span>
		                               <i class="fa fa-lock"> </i>
							           <input type="password" placeholder="Mot de passe " name="password" required/>
		                           </span><br>
						            <button name="login"  type="submit" value="connexion"> connexion </button>
		                    </form>
							
							       
		             </div>






         </div>
</div>


<?php


    if (isset($_POST["login"])) {

      $username ="root";

    $password ="";

    $database =new PDO("mysql:host=localhost; dbname=dbcabinet",$username,$password);
    $login = $database->prepare("SELECT * FROM users WHERE email =:email AND password =:password");
    $login->bindParam(":email",$_POST["email"]);
    $login->bindParam(":password",$_POST["password"]);
    $login->execute();

    if ($login->rowCount()===1){
        $user =$login->fetchObject();

        session_start();
        $_SESSION["user"]=$user;
       
          
           if($user->role==="medecin"){
              
           header("location:http://localhost/atelier/dash.php");
    }else if($user->role==="secretaire"){
        header("location:http://localhost/atelier/sec/dash.php");
}else{
        header("location:http://localhost/atelier/login/login.php");
    }

  

      # code...
    }}


    ?>

</body>
</html>