<?php

$servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "bureau_avocats";
 $conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
   die("Erreur de connection : " . $conn->connect_error);
 }

session_start();

if(!($_SESSION['type']=='avocat')){
   header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css" type="text/css" />
    <link rel="shortcut icon" href="../logo/favicon.ico"/>
    <link rel="stylesheet" href="../style/style_av.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-rz/XW1FqhNQ6C5U6f5v5M5KaUTQwKilUUIy5S6RjKfuLyK4ksd9Y+lZPxv4+Qqtn" crossorigin="anonymous">
</head>
<title>  <?php echo   $_SESSION['nom']."  " . $_SESSION['prenom']; ?> | Espace avocat</title>
</head>

<body>
 
<style>body{
	margin:0px;
	padding: 0px;
    background:none;
	background-color:#efeff5;
	font-family: system-ui;
}
    </style>
    
<div id="mySidenav" class="sidenav">
        <p class="logo"> <span class="menu">&#9776;</span></p>
        <p class="logo1"> <span class="menu1">&#9776;</span></p>
        <a href="#" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Table de bord</a>
        <a href="avocat.php" class="icon-a"><i class="fa fa-home icons" ></i>&nbsp;&nbsp;Accueil</a>
        <a href="Avocats.php" class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Avocats membres</a>
        <a href="ClientsAvocat.php"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Clients</a>
       
        <a href="affaireAvocat.php" class="icon-a"><i class="fa fa-briefcase icons" ></i> &nbsp;&nbsp;Affaires</a>
        <a href="procesAvocat.php" class="icon-a"><i class="fa fa-gavel icons"></i> &nbsp;&nbsp;Les procès</a>

        <a href="consultationsAvocat.php" class="icon-a"><i class="fa fa-calendar icons"></i> &nbsp;&nbsp;Consultations</a>
        
        <a href="caisse.php"class="icon-a"><i class="fa fa-money icons"></i> &nbsp;&nbsp;Caisse</a>
        <a href="#"class="icon-a"><i class="fa fa-bell icons"></i> &nbsp;&nbsp;Notification</a>


    </div>
    <div id="main">

        <div class="head">
            <div class="col-div-6">
                <p class="nav"> Table de bord</p>

            </div>

            <div class="col-div-6">
                <i class="fa fa-search search-icon"></i>


                <i class="fa fa-bell noti-icon"></i>
                <div class="notification-div">
                    <p class="noti-head">Notification <span>2</span></p>
                    <hr class="hr" />

                </div>
                <div class="profile">


                    <p><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;
                        <?php echo   $_SESSION['nom']."  " . $_SESSION['prenom']; ?> <i class="fa fa-ellipsis-v dots"
                            aria-hidden="true"></i></p>

                    <div class="profile-div">
                        <!-- <p><i class="fa fa-user"></i>&nbsp;&nbsp; Profile</p> -->
                        <a href="profileavocat.php"><p><i class="fa fa-user"></i>&nbsp;&nbsp; Profile</p></a>
                        <!-- <p><i class="fa fa-cogs"></i>&nbsp;&nbsp; Parametres</p> -->
                        <a href="parametresavocat.php"><p><i class="fa fa-cogs"></i>&nbsp;&nbsp; Parametres</p></a>
                        <!-- <p><i class="fa fa-power-off"></i>&nbsp;&nbsp; Déconnexion</p> -->
                       <a href="logout.php" class="logoutBtn" id="logoutBtn"><p><i class="fa fa-power-off"></i>&nbsp;&nbsp; Déconnexion</p></a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php 
       
        $sql1="SELECT client_phy.adresse_Clphy,client_phy.nomClphy,client_phy.date_naiss,client_phy.id_cin_clphy ,client_phy.prenomClphy, client_phy.profession, client_phy.num_telClphy, client_phy.emailClphy
        from client_phy
        INNER JOIN affaire ON client_phy.id_cin_clphy=affaire.id_cin_clphy
        WHERE affaire.id_cin='" . $_SESSION['id'] . "'
        Group BY client_phy.id_cin_clphy";
        $res1=$conn->query($sql1);
        $sql2="SELECT client_mor.id_ClMor, client_mor.nomClMor,client_mor.adresseClMor,  client_mor.num_telClMor, client_mor.emailClMor,client_mor.secteur
        from client_mor
        INNER JOIN affaire ON client_mor.id_ClMor=affaire.id_ClMor
        WHERE affaire.id_cin='" . $_SESSION['id'] . "'
        Group BY client_mor.id_ClMor";
        $res2=$conn->query($sql2);
        ?>
        <div class="content">
                <p class="head-1">Votre Clients</p>
                <div class="clearfix"></div>
                <br />
                <div class="tableau">
                <?php 
               
                if ($res1 && $res1->num_rows > 0) {
                  echo" <table >
                <tr> <th>Client </th> <th>Date de naissance </th><th>Profession</th><th>Numéro de CIN</th> <th>Téléphone</th> <th>E-mail</th>  <th>Adresse</th> </tr>";
                 while($row1 = $res1->fetch_assoc()) {
                  
                   echo"<tr>
                           
                           <td>".$row1['nomClphy']."  ".$row1['prenomClphy']."</td>
                           <td>".$row1['date_naiss']."</td> 
                           <td>".$row1['profession']."</td> 
                           <td>".$row1['id_cin_clphy']."</td>
                           <td>".$row1['num_telClphy']."</td> 
                           <td>".$row1['emailClphy']."</td> 
                           <td>".$row1['adresse_Clphy']."</td> 
                           </tr>";
                           

                       
                 }
                 echo "</table>";

                 
                 }
                 if ($res2 && $res2->num_rows > 0) {
                    echo" <table class='table-inter'>
                  <tr> <th>Client </th><th>Identifiant </th> <th>Secteur </th> <th>Téléphone</th> <th>E-mail</th><th>Adresse</th> </tr>";
                   while($row2 = $res2->fetch_assoc()) {
                    
                     echo"<tr>
                             
                             <td>".$row2['nomClMor']."  </td>
                             <td>".$row2['id_ClMor']."  </td>
                             <td>".$row2['secteur']."</td> 
                           
                             <td>".$row2['num_telClMor']."</td> 
                             <td>".$row2['emailClMor']."</td> 
                             <td>".$row2['adresseClMor']."</td> 
                             </tr>";
                             
  
                         
                   }
                   echo "</table>";
  
                   
                   }
                 
                 
                  
                 ?>
               
               </div>
        <div class="clearfix"></div>
        <br />





        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(".menu").click(function() {
        $("#mySidenav").css('width', '70px');
        $("#main").css('margin-left', '70px');
        $(".logo").css('display', 'none');
        $(".logo1").css('display', 'block');
        $(".logo span").css('visibility', 'visible');
        $(".logo span").css('margin-left', '-10px');
        $(".icon-a").css('visibility', 'hidden');
        $(".icon-a").css('height', '55px');
        $(".icons").css('visibility', 'visible');
        $(".icons").css('margin-left', '-8px');
        $(".menu1").css('display', 'block');
        $(".menu").css('display', 'none');
    });

    $(".menu1").click(function() {
        $("#mySidenav").css('width', '300px');
        $("#main").css('margin-left', '300px');
        $(".logo").css('visibility', 'visible');
        $(".logo").css('display', 'block');
        $(".icon-a").css('visibility', 'visible');
        $(".icons").css('visibility', 'visible');
        $(".menu").css('display', 'block');
        $(".menu1").css('display', 'none');
    });
    </script>
    <script>
    $(document).ready(function() {
        $(".profile p").click(function() {
            $(".profile-div").toggle();

        });
       




    });
    </script>

</body>

</html>