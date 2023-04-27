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
        <p class="head-1">Votre affaires</p>
                <br />
               
    
        <?php 
                
                $sql1="SELECT  affaire.id_aff, affaire.date_fin, affaire.date_dep, affaire.commission, client_phy.nomClphy, client_phy.prenomClphy, expert.nomEx, expert.prenomEx
                FROM affaire 
                INNER JOIN client_phy ON affaire.id_cin_clphy = client_phy.id_cin_clphy
                INNER JOIN expert ON affaire.id_cin_ex = expert.id_cin_ex 
                WHERE   confirmEx = 'oui' 
                  and  confirmHN='non'
                AND affaire.id_cin = '" . $_SESSION['id'] . "'
                GROUP BY affaire.id_aff
                ";
                   
                $sql2="  SELECT affaire.id_aff, affaire.date_fin, affaire.date_dep, affaire.id_aff, affaire.commission, client_phy.nomClphy, client_phy.prenomClphy, houss_not.nomHN, houss_not.prenomHN
                FROM affaire 
                INNER JOIN client_phy ON affaire.id_cin_clphy = client_phy.id_cin_clphy
                INNER JOIN houss_not ON affaire.id_cin_hn = houss_not.id_cin_hn  
                WHERE   confirmHN = 'oui' 
                 AND confirmEx='non' 
                AND affaire.id_cin = '" . $_SESSION['id'] . "'
                GROUP BY affaire.id_aff";
                
    
                $sql3="  SELECT affaire.id_aff, affaire.date_fin, affaire.date_dep, affaire.id_aff, affaire.commission, client_phy.nomClphy, client_phy.prenomClphy  
                FROM affaire 
                INNER JOIN client_phy ON affaire.id_cin_clphy = client_phy.id_cin_clphy
                WHERE  confirmHN='non' 
                AND   confirmEx='non' 
                AND affaire.id_cin = '" . $_SESSION['id'] . "' 
                GROUP BY affaire.id_aff";
                
                
                $sql4="SELECT affaire.date_fin, affaire.date_dep , affaire.id_aff,affaire.commission , client_phy.nomClphy, client_phy.prenomClphy , expert.nomEx, expert.prenomEx,houss_not.nomHN, houss_not.prenomHN 
                FROM affaire 
                INNER JOIN client_phy ON affaire.id_cin_clphy=client_phy.id_cin_clphy
                INNER JOIN expert ON affaire.id_cin_ex=expert.id_cin_ex 
                INNER JOIN houss_not ON affaire.id_cin_hn=houss_not.id_cin_hn  
                   WHERE confirmHN='oui' 
                   AND confirmEx='oui' 
               
               
                 AND  affaire.id_cin='" . $_SESSION['id'] . "' 
                 GROUP BY affaire.id_aff ";
                 $res1=$conn->query($sql1);
                 $res2=$conn->query($sql2);
                 $res3=$conn->query($sql3);
                 $res4=$conn->query($sql4);
                 echo" <table style='margin-top:20px'>
                 <tr> <th>Numéro d'affaire  </th> <th>Date début </th> <th>Date fin </th><th>Client </th> <th>Huissier Notaire</th> <th>Expert </th><th>Commission </th></tr>";
                 if($res4)
                 {
                    while($row4=$res4->fetch_assoc())
                 {
                    $comm=$row4['commission'];
                    $dateFin=$row4['date_fin'];
                    if($row4['date_fin']=='0000-00-00')
                    $dateFin="-";
                    if($row4['commission']==0)
                    $comm="-";
                    
                     echo"<tr>
                            <td>".$row4['id_aff']."</td>
                             
                             <td>".$row4['date_dep']."</td>
                             <td>".$dateFin."  </td>
                             <td>".$row4['nomClphy']." " . $row4['prenomClphy']."</td>
                             <td>".$row4['nomHN']." " . $row4['prenomHN']."</td>
                             <td>".$row4['nomEx']." " . $row4['prenomEx']."</td>
                             
                             <td>".$comm."  </td>
                             
    
                             </tr>";
                 }
                 }
                 if($res2)
                 {
                    while($row2=$res2->fetch_assoc())
                 {
                    $comm=$row2['commission'];
                    $dateFin=$row2['date_fin'];
                    if($row2['date_fin']=='0000-00-00')
                    $dateFin="-";
                    if($row2['commission']==0)
                    $comm="-";
                    
                     echo"<tr>
                            <td>".$row2['id_aff']."</td>
                             
                             <td>".$row2['date_dep']."</td>
                             <td>".$dateFin."  </td>
                             <td>".$row2['nomClphy']." " . $row2['prenomClphy']."</td>
                             <td>".$row2['nomHN']." " . $row2['prenomHN']."</td>
                             <td>"."-"."</td>
                             
                             <td>".$comm."  </td>
                             
    
                             </tr>";
                 }
                 }
                if($res1)
                {
                    while($row1=$res1->fetch_assoc())
                    {
                       $comm=$row1['commission'];
                       $dateFin=$row1['date_fin'];
                       if($row1['date_fin']=='0000-00-00')
                       $dateFin="-";
                       if($row1['commission']==0)
                       $comm="-";
                       
                        echo"<tr>
                               <td>".$row1['id_aff']."</td>
                                
                                <td>".$row1['date_dep']."</td>
                                <td>".$dateFin."  </td>
                                <td>".$row1['nomClphy']." " . $row1['prenomClphy']."</td>
                                <td>"."-"."</td>
                                <td>".$row1['nomEx']." " . $row1['prenomEx']."</td>
                                
                                <td>".$comm."  </td>
                                
       
                                </tr>";
                    }
                }
                 if($res3)
                 {
                    while($row3=$res3->fetch_assoc())
                 {
                    $comm=$row3['commission'];
                    $dateFin=$row3['date_fin'];
                    if($row3['date_fin']=='0000-00-00')
                    $dateFin="-";
                    if($row3['commission']==0)
                    $comm="-";
                    
                     echo"<tr>
                            <td>".$row3['id_aff']."</td>
                             
                             <td>".$row3['date_dep']."</td>
                             <td>".$dateFin."  </td>
                             <td>".$row3['nomClphy']." " . $row3['prenomClphy']."</td>
                             <td>"."-"."</td>
                             <td>"."-"."</td>
                             
                             <td>".$comm."  </td>
                             
    
                             </tr>";
                 }
                 }
                 echo" </table >";
                
    
                 $sql5="SELECT  affaire.id_aff ,affaire.date_fin, affaire.date_dep , affaire.commission ,client_mor.nomClMor, expert.nomEx, expert.prenomEx
                FROM affaire 
                INNER JOIN client_mor ON affaire.id_ClMor=client_mor.id_ClMor
                INNER JOIN expert ON affaire.id_cin_ex=expert.id_cin_ex 
                  
                WHERE affaire.id_cin_ex <> 0 AND confirmEx = 'oui' 
                  and  confirmHN='non'
               
                 AND  affaire.id_cin='" . $_SESSION['id'] . "'  
                 
                 GROUP BY affaire.id_aff";
                   
                $sql6="  SELECT affaire.id_aff , affaire.date_fin, affaire.date_dep , affaire.id_aff,affaire.commission ,client_Mor.nomClMor ,houss_not.nomHN,houss_not.prenomHN
                   FROM affaire 
                   INNER JOIN client_mor ON affaire.id_ClMor=client_mor.id_ClMor
                    
                   INNER JOIN houss_not ON affaire.id_cin_hn=houss_not.id_cin_hn  
                   WHERE affaire.id_cin_hn <> 0 AND confirmHN = 'oui' 
                 AND confirmEx='non' 
                  
                    AND  affaire.id_cin='" . $_SESSION['id'] . "'
                    GROUP BY affaire.id_aff  ";
    
                $sql7="  SELECT affaire.id_aff , affaire.date_fin, affaire.date_dep , affaire.id_aff,affaire.commission ,client_Mor.nomClMor  
                FROM affaire 
                INNER JOIN client_mor ON affaire.id_ClMor=client_mor.id_ClMor
                 
                
                WHERE  confirmHN='non' 
                AND   confirmEx='non' 
                 AND  affaire.id_cin='" . $_SESSION['id'] . "' 
                 GROUP BY affaire.id_aff ";
                
                $sql8="SELECT affaire.date_fin, affaire.date_dep , affaire.id_aff,affaire.commission ,client_mor.nomClMor, expert.nomEx, expert.prenomEx,houss_not.nomHN, houss_not.prenomHN 
                FROM affaire 
                INNER JOIN client_mor ON affaire.id_ClMor=client_mor.id_ClMor
                INNER JOIN expert ON affaire.id_cin_ex=expert.id_cin_ex 
                INNER JOIN houss_not ON affaire.id_cin_hn=houss_not.id_cin_hn  
                WHERE confirmHN='oui' 
                   AND confirmEx='oui' 
               
               
                 AND  affaire.id_cin='" . $_SESSION['id'] . "' 
                 GROUP BY affaire.id_aff ";
                 $res5=$conn->query($sql5);
                 $res6=$conn->query($sql6);
                 $res7=$conn->query($sql7);
                 $res8=$conn->query($sql8);
                 echo" <table class='table-inter' >
                 <tr> <th>Code d'affaire  </th> <th>Date début </th> <th>Date fin </th><th>Client </th> <th>Huissier Notaire</th> <th>Expert </th><th>Commission </th></tr>";
                 if($res8)
                 {
                    while($row8=$res8->fetch_assoc())
                 {
                    $comm=$row8['commission'];
                    $dateFin=$row8['date_fin'];
                    if($row8['date_fin']=='0000-00-00')
                    $dateFin="-";
                    if($row8['commission']==0)
                    $comm="-";
                    
                     echo"<tr>
                            <td>".$row8['id_aff']."</td>
                             
                             <td>".$row8['date_dep']."</td>
                             <td>".$dateFin."  </td>
                             <td>".$row8['nomClMor']."</td>
                             <td>".$row8['nomHN']." " . $row8['prenomHN']."</td>
                             <td>".$row8['nomEx']." " . $row8['prenomEx']."</td>
                             
                             <td>".$comm."  </td>
                             
    
                             </tr>";
                 }
                 }
                 if($res6)
                 {
                    while($row6=$res6->fetch_assoc())
                 {
                    $comm=$row6['commission'];
                    $dateFin=$row6['date_fin'];
                    if($row6['date_fin']=='0000-00-00')
                    $dateFin="-";
                    if($row6['commission']==0)
                    $comm="-";
                    
                     echo"<tr>
                            <td>".$row6['id_aff']."</td>
                             
                             <td>".$row6['date_dep']."</td>
                             <td>".$dateFin."  </td>
                             <td>".$row6['nomClMor']." </td>
                             <td>".$row6['nomHN']." " . $row6['prenomHN']."</td>
                             <td>"."-"."</td>
                             
                             <td>".$comm."  </td>
                             
    
                             </tr>";
                 }
                 }
                if($res5)
                {
                    while($row5=$res5->fetch_assoc())
                    {
                       $comm=$row5['commission'];
                       $dateFin=$row5['date_fin'];
                       if($row5['date_fin']=='0000-00-00')
                       $dateFin="-";
                       if($row5['commission']==0)
                       $comm="-";
                       
                        echo"<tr>
                               <td>".$row5['id_aff']."</td>
                                
                                <td>".$row5['date_dep']."</td>
                                <td>".$dateFin."  </td>
                                <td>".$row5['nomClMor']." </td>
                                <td>"."-"."</td>
                                <td>".$row5['nomEx']." " . $row5['prenomEx']."</td>
                                
                                <td>".$comm."  </td>
                                
       
                                </tr>";
                    }
                }
                 if($res7)
                 {
                    while($row7=$res7->fetch_assoc())
                 {
                    $comm=$row7['commission'];
                    $dateFin=$row7['date_fin'];
                    if($row7['date_fin']=='0000-00-00')
                    $dateFin="-";
                    if($row7['commission']==0)
                    $comm="-";
                    
                     echo"<tr>
                            <td>".$row7['id_aff']."</td>
                             
                             <td>".$row7['date_dep']."</td>
                             <td>".$dateFin."  </td>
                             <td>".$row7['nomClMor']." </td>
                             <td>"."-"."</td>
                             <td>"."-"."</td>
                             
                             <td>".$comm."  </td>
                           
    
                             </tr>";
                 }
                 }
                 echo" </table >";
                
    
                
                
    
                
                
                      
                   
        
               
                
    
                
                
                      
                   ?>
                   </div>
        
               
               
        <div class="clearfix"></div>
        <br />
        <a href="modifAffaireChef.php" style="text-decoration:none;"><span  style=" background-color:#8f6118f6;
  border-radius: 5px;
    color: white;
    padding: 10px 10px;
    margin-left:150px;
    font-size: 15px;">Modifier des données d'une affaire</span></a> 

       
                <a href="ajoutAffaireClphyChef.php" style="text-decoration:none;"><span  style=" background-color:#8f6118f6;
  border-radius: 5px;
    color: white;
    padding: 10px 10px;
    margin-right:20px;
    margin-left:20px;
  /* border:solid 1px #8f6118f6; */
    font-size: 15px;">Ajouter une affaire pour un client physique</span></a> 
    
     <a href="ajoutAffaireClmorChef.php" style="text-decoration:none;"><span  style=" background-color:#8f6118f6;
  border-radius: 5px;
    color: white;
    padding: 10px 10px;
    margin-left:20px;
    font-size: 15px;">Ajouter une affaire pour un client morale</span></a> 





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