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

if(!($_SESSION['type']=='chef_avocat')){
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
        <a href="chefavocat.php" class="icon-a"><i class="fa fa-home icons" ></i>&nbsp;&nbsp;Accueil</a>
        <a href="AvocatsChef.php" class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Avocats membres</a>
        <a href="clientAvocatChef.php"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Clients</a>
       
        <a href="affairesChefAvocat.php" class="icon-a"><i class="fa fa-briefcase icons" ></i> &nbsp;&nbsp;Affaires</a>
        <a href="procesAvocatChef.php" class="icon-a"><i class="fa fa-gavel icons"></i> &nbsp;&nbsp;Les procès</a>

        <a href="consultationsAvocatChef.php" class="icon-a"><i class="fa fa-calendar icons"></i> &nbsp;&nbsp;Consultations</a>
        
        <a href="caisseChef.php"class="icon-a"><i class="fa fa-money icons"></i> &nbsp;&nbsp;Caisse</a>
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
                        <a href="profileavocatChef.php"><p><i class="fa fa-user"></i>&nbsp;&nbsp; Profile</p></a>
                        <!-- <p><i class="fa fa-cogs"></i>&nbsp;&nbsp; Parametres</p> -->
                        <a href="parametresavocatChef.php"><p><i class="fa fa-cogs"></i>&nbsp;&nbsp; Parametres</p></a>
                        <!-- <p><i class="fa fa-power-off"></i>&nbsp;&nbsp; Déconnexion</p> -->
                       <a href="logout.php" class="logoutBtn" id="logoutBtn"><p><i class="fa fa-power-off"></i>&nbsp;&nbsp; Déconnexion</p></a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="content">
                <p class="head-1">Paiement</p>
                <div class="clearfix"></div>
                <br />
                <?php        
        $sql="SELECT  facture.dateFact, facture.id_pay_numCarte,facture.id_aff,client_phy.nomClphy, client_phy.prenomClphy, facture.montant
        FROM facture
        INNER JOIN moy_pay ON facture.id_pay_numCarte=moy_pay.id_pay_numCarte 
        INNER JOIN client_phy ON client_phy.id_cin_clphy= moy_pay.id_cin_clphy
        INNER JOIN affaire ON affaire.id_cin_clphy= moy_pay.id_cin_clphy
        INNER JOIN affaire ON affaire.id_aff= facture.id_aff
        WHERE affaire.id_cin='" . $_SESSION['id'] . "'
        GROUP BY facture.code";
        
            $sql1="SELECT  facture.dateFact, facture.id_pay_numCarte,facture.id_aff,client_mor.nomClMor, facture.montant
            FROM facture
            INNER JOIN moy_pay ON facture.id_pay_numCarte=moy_pay.id_pay_numCarte 
            INNER JOIN client_mor ON client_mor.id_ClMor= moy_pay.id_ClMor
            INNER JOIN affaire ON affaire.id_ClMor= moy_pay.id_ClMor
            INNER JOIN affaire ON affaire.id_aff= facture.id_aff
            WHERE affaire.id_cin='" . $_SESSION['id'] . "'
            GROUP BY facture.code";
        $res=$conn->query($sql);
        $res1=$conn->query($sql1);
        $tot=0;
                
                 if ($res || $res1 ) {
                    echo" <table  >
                    <tr> <td>Montant (DT)</td>  <td>Client </td>  <td>Code Affaire </td>  <td>Date </td> </tr>";
                    while($row = $res->fetch_assoc()){
                 $tot=$tot+$row['montant'];
                echo "<tr>
                           
                           <td>".$row['montant']."</td>
                           <td>".$row['nomClphy']." ".$row['prenomClphy']."</td>
                           <td>".$row['id_aff']."</td>
                           <td>".$row['dateFact']." </td>
                          
                           

                           
                           </tr>";
                    }
                    while($row1 = $res1->fetch_assoc()){
                        $tot=$tot+$row1['montant'];
                       echo "<tr>
                                  
                                  <td>".$row1['montant']."</td>
                                  <td>".$row1['nomClMor']."</td>
                                  <td>".$row1['id_aff']."</td>
                                  <td>".$row1['dateFact']." </td>
                                  
                                  
       
                                  
                                  </tr> </table>";
                           }
                           echo "<table class='table-inter'>
                           <th> <td>Totale(DT)</td> <td>".$tot."</td></th>
                           </table> ";
                
                 
               } else {
                echo" <table>
                <tr> <td>Montant </td> <td>Client </td>  <td>Code Affaire </td>  <td>Date </td>  </tr>
                <tr>
                           
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
               
                

                
                </tr>
                </table>
                ";

               }
               ?>

        </div>
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
        $(".noti-icon").click(function() {
            $(".notification-div").toggle();
        });




    });
    </script>

</body>

</html>