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

if(!($_SESSION['type']=='secretaire')){
   header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css" type="text/css" />
    <link rel="stylesheet" href="../style/style_av.css" type="text/css" />
    <link rel="shortcut icon" href="../logo/favicon.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
    
        integrity="sha384-rz/XW1FqhNQ6C5U6f5v5M5KaUTQwKilUUIy5S6RjKfuLyK4ksd9Y+lZPxv4+Qqtn" crossorigin="anonymous">
</head>
<title>  <?php echo   $_SESSION['nom']."  " . $_SESSION['prenom']; ?> | Espace secretaire</title>
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
    <?php
        if (isset($_SESSION['success'] )) {?>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span id="closeModal" class="close">&times;</span>
            <h2>Bienvenue</h2>
            <?php echo '<span class="succ-form">'.$_SESSION["success"] .'</span>';?>
        </div>
    </div>
    <?php }  ?>
    <script>
    var modal = document.getElementById("modal");
    var span = document.getElementById("closeModal");
    var succ = "<?php echo $_SESSION["success"]; ?>";
    if (succ !== "") {
        modal.style.display = "block"; // Affichage de la modale
        <?php  $_SESSION["success"]=""; ?> //supprime message de succ affiche sauf au 1er fois
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
    <?php 
$sql1="SELECT client_phy.nomClphy ,client_Phy.prenomClphy,consultation.id_cons ,avocat.prenomA, avocat.nomA, consultation.dateCons, consultation.heure, affaire.id_aff 
from consultation 
INNER JOIN affaire ON consultation.id_aff=affaire.id_aff
INNER JOIN client_phy ON client_phy.id_cin_clphy=affaire.id_cin_clphy
INNER JOIN avocat  ON affaire.id_cin=avocat.id_cin
WHERE affaire.id_ClMor=0
AND consultation.confirm='non'";
$res1=$conn->query($sql1) ;
$sql4="SELECT client_mor.nomClMor , consultation.id_cons ,avocat.prenomA, avocat.nomA, consultation.dateCons, consultation.heure, affaire.id_aff 
from consultation 
INNER JOIN affaire ON consultation.id_aff=affaire.id_aff 
INNER JOIN client_mor ON client_mor.id_clMor=affaire.id_ClMor
INNER JOIN avocat  ON affaire.id_cin=avocat.id_cin
WHERE affaire.id_ClMor<>0
AND consultation.confirm='non'";
$res4=$conn->query($sql4);


 ?>
     <div id="mySidenav" class="sidenav">
        <p class="logo"> <span class="menu">&#9776;</span></p>
        <p class="logo1"> <span class="menu1">&#9776;</span></p>
        <a href="#" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Table de bord</a>
        <a href="secretaire.php" class="icon-a"><i class="fa fa-home icons" ></i>&nbsp;&nbsp;Acceuil</a>
        <a href="consultationsClPhy.php" class="icon-a"><i class="fa fa-calendar icons"></i> &nbsp;&nbsp;Consultations</a>
        <a href="avocatsec.php" class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Avocats</a>
        <a href="clientphysec.php" class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Client physique </a>
        <a href="clientmorsec.php" class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Client morale </a>
        <a href="NotificationClPhy.php" class="icon-a"><i class="fa fa-bell icons"></i> &nbsp;&nbsp;Notification</a>


    </div>
    <div id="main" style="margin-left:19%;">

        <div class="head">
            <div class="col-div-6">
                <p class="nav"> Table de bord</p>

            </div>

            <div class="col-div-6">
                <div class="notification-div">
                    <p class="noti-head">Notification <span>2</span></p>
                    <hr class="hr" />

                </div>
                <div class="profile" >


                    <p><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;
                        <?php echo   $_SESSION['nom']."  " . $_SESSION['prenom']; ?> <i class="fa fa-ellipsis-v dots"
                            aria-hidden="true"></i></p>

                    <div class="profile-div">
                        
                        <a href="profileClPhy.php"><p><i class="fa fa-user"></i>&nbsp;&nbsp; Profile</p></a>
                        
                        <a href="parametresClPhy.php"><p><i class="fa fa-cogs"></i>&nbsp;&nbsp; Parametres</p></a>
                 
                       <a href="logout.php" class="logoutBtn" id="logoutBtn"><p><i class="fa fa-power-off"></i>&nbsp;&nbsp; Déconnexion</p></a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
        <br />

        <div class="col-div-4-1">
            <div class="box">
                <p class="head-1">Client physique</p>
                <p class="number"><?php  $sql10 = "SELECT count(*) FROM client_phy";
                $res10 = $conn->query($sql10);
               $row10 = $res10->fetch_array() ;
                 echo $row10[0];?></p>
                <p class="percent"><i class="fa fa-long-arrow-up" aria-hidden="true"></i> 5.674% <span>Since Last
                        Months</span></p>

                <i class="fa fa-calendar box-icon"></i>
            </div>
        </div>
        <div class="col-div-4-1">
            <div class="box">
                <p class="head-1">Clients Morale</p>
                <p class="number"><?php $sql10="SELECT count(*) FROM client_mor";
             $sql11 = "SELECT count(*) FROM client_mor";
             $res11 = $conn->query($sql11);
             $row11 = $res11->fetch_array();
             echo $row11[0];
              ?></p>
                <p class="percent" style="color:red!important"><i class="fa fa-long-arrow-down" ></i>
                    5.64% <span>Since Last Months</span></p>

                <i class="fa fa-check box-icon"></i>
            </div>
        </div>
        <div class="col-div-4-1">
            <div class="box">
                <p class="head-1">Affaires en cours</p>
                <p class="number"><?php 
                $sql12="SELECT count(*) FROM affaire
                 WHERE date_fin= '0000-00-00'";
                  $res12 = $conn->query($sql12);
                  $row12 = $res12->fetch_array();
                  echo $row12[0];?></p>
                <p class="percent"><i class="fa fa-long-arrow-up" aria-hidden="true"></i> 5.674% <span>Since Last
                        Months</span></p>
                <i class="fa fa-circle-o-notch box-icon"></i>
            </div>
        </div>
        <div class="col-div-4-1">
            <div class="box-2">
                <div class="content-box-1"style="overflow-y:scroll;">
                    <p class="head-1"> Nouvelles demandes de consultations client morale <span><i class="fa fa-calendar icons"></i></span></p>
                    <?php 
                if ($res4 && $res4->num_rows > 0) {
                  echo" <table class='table-inter' >
                <tr> <th>Avocat</th><th> Client </th><th> Affaire </th> <th> Date </th> <th> Heure </th> </tr>";
                while($row = $res4->fetch_assoc()) {
                  echo "<tr>
                          <td>".$row['nomA']." ".$row['prenomA']."</td>
                          <td>".$row['nomClMor']."</td>";
                        echo "<td>".$row['id_aff']."</td>
                  <td>".$row['dateCons']."</td>
                        <td>".$row['heure']."</td>";
                        echo '<td> 
                   <form method="POST" action="secretaire.php">
                    <input type="hidden" name="id" value="'.$row['id_cons'].'">
                      <button type="submit" name="confirmer" style="background-color:#3CB371; padding:3px; margin-bottom:7px;border-radius :20px;font-size:12px; display:float ;width:80px;" > Confirmer </button> 
                      <button type="submit" name="refuser"style="background-color: #FFA07A; border-radius :20px;font-size:12px;width:80px;pointer:cursor;"> Refuser </button> </form> 
                      </td> </tr>';
              }
              echo "</table>";
            }
            else echo "Aucune nouvelle demande"; ?>
                 </div>
        </div>
    </div>
        <div class="clearfix"></div>
        <br />
        <div class="col-div-4-1">
            <div class="box-1" style="margin-left:405px;">
                <div class="content-box-1"style="overflow-y:scroll;">
                    <p class="head-1"> Nouvelles demandes de consultations client physique <span><i class="fa fa-calendar icons"></i></span></p>
                    <?php 
                if ($res1 && $res1->num_rows > 0) {
                  echo" <table class='table-inter' >
                <tr> <th>Avocat</th><th> Client </th><th> Affaire </th> <th> Date </th> <th> Heure </th> </tr>";
                while($row = $res1->fetch_assoc()) {
                  echo "<tr>
                          <td>".$row['nomA']." ".$row['prenomA']."</td>
                          <td>".$row['nomClphy']." ".$row['prenomClphy']."</td>";
                        echo "<td>".$row['id_aff']."</td>
                  <td>".$row['dateCons']."</td>
                        <td>".$row['heure']."</td>";
                        echo '<td> 
                   <form method="POST" action="secretaire.php">
                    <input type="hidden" name="id" value="'.$row['id_cons'].'">
                    <input type="hidden" name="idaff" value="'.$row['id_aff'].'">
                    <input type="hidden" name="date" value="'.$row['dateCons'].'">
                    <input type="hidden" name="hour" value="'.$row['heure'].'">
                      <button type="submit" name="confirmer" style="background-color:#3CB371; padding:3px; margin-bottom:7px;border-radius :20px;font-size:12px; display:float ;width:80px;" > Confirmer </button> 
                      <button type="submit" name="refuser"style="background-color: #FFA07A; border-radius :20px;font-size:12px;width:80px;pointer:cursor;"> Refuser </button> </form> 
                      </td> </tr>';
              }
              echo "</table>";
            }
            else echo "Aucune nouvelle demande"; ?>
                 </div>
        </div>
    </div>
    <?php
    if (isset($_POST['confirmer'])) {
      $id = $_POST['id'];
      $idaf = $_POST['idaff'];
      $d=$_POST['date'] ;
      $h=$_POST['hour'];
      $sql7="SELECT affaire.id_cin_clphy, affaire.id_ClMor, avocat.id_cin ,client_phy.nomClphy,client_phy.prenomClphy,avocat.nomA,avocat.prenomA,client_mor.nomClMor    
      FROM affaire
      LEFT JOIN client_phy ON client_phy.id_cin_clphy=affaire.id_cin_clphy
      LEFT JOIN client_mor ON client_mor.id_ClMor=affaire.id_ClMor
      LEFT JOIN avocat ON avocat.id_cin=affaire.id_cin
      WHERE id_aff=$idaf";
      $res7=$conn->query($sql7) ;
      while ($row = $res7->fetch_assoc()) {
        $a = $row['nomA']." ".$row['prenomA'];
        if ($row['id_ClMor'] ==0) {
          $idcl=$row['id_cin_clphy'] ;
          $type="clientphy";
        $c = $row['nomClphy']." ".$row['prenomClphy'] ;
        } else {  $idcl=$row['id_ClMor'] ;
          $c=$row['nomClMor'] ;
         $type="clientmor";
        }
        $ida = $row['id_cin'];
    }
    $msgcl = 'Confirmation de votre demande de consultation avec '.$a.' le '.$d.' à '.$h.'.' ;
    $msga = 'Vous avez une nouvelle consultation avec '.$c.' le '.$d.' à '.$h.'.' ;
    $sql9="INSERT INTO notif (id_user, user_type, msg) VALUES ($idcl,'$type','$msgcl') ";
    $sql8="INSERT INTO notif (id_user, user_type, msg) VALUES ($ida,'avocat','$msga') ";
      $sql2 = "UPDATE consultation SET confirm='oui' WHERE id_cons=$id";
      $res=$conn->query($sql2) ;
      if ($res)
      {$res9=$conn->query($sql9) ;
        $res8=$conn->query($sql8) ;
      }
    }
    if (isset($_POST['refuser'])) {
        $id=$_POST['id'] ;
       $sql3="DELETE FROM consultation
       WHERE id_cons=$id ";
       $res=$conn->query($sql3) ;
    }
    ?>
        <div class="col-div-4-1">
            <div class="box-1" style="margin-left:415px;">
                <div class="content-box-1">
                    <p class="head-1">Ajout Consultation <span><i class="fa fa-calendar icons"></i></span></p>
                    <br />
                    <div class="formulaire1">
                        <form action="secretaire.php" method="POST">
                         <div class="inputBox">
                                <input type="text" name="idaff" required placeholder="id affaire">
                            </div>
                         
                            <div class="inputBox">

                                <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')"
                                    name="date" required placeholder="Date">
                                    

                            </div>
                            
                            <div class="inputBox">
                                <input type="text" onfocus="(this.type='time')" onblur="(this.type='text')"
                                    name="heure" required placeholder="Heure">
                            </div>
                            <button type="submit" name="ajout">Envoyer</button>

                        </form>
                        <?php 
                if(isset($_POST['ajout'])){
                    if(isset($_POST['date'])&& (isset($_POST['heure'])) && (isset($_POST['idaff'])))
                  {$d=$_POST['date'];
                    $h=$_POST['heure'];
                    $id = $_POST['idaff'];
                    $sql7="SELECT affaire.id_cin_clphy,affaire.id_ClMor, client_mor.nomClMor ,client_phy.nomClphy,client_phy.prenomClphy,avocat.nomA,avocat.prenomA, affaire.id_cin
                    FROM affaire
                    LEFT JOIN client_phy ON client_phy.id_cin_clphy=affaire.id_cin_clphy
                    LEFT JOIN client_mor ON client_mor.id_ClMor=affaire.id_ClMor
                    LEFT JOIN avocat ON avocat.id_cin=affaire.id_cin
                    WHERE affaire.id_aff=$id";
                    $res7=$conn->query($sql7) ;
                    if ($res7->num_rows>0)
                    { while ($row = $res7->fetch_assoc()) {
                      $a = $row['nomA']." ".$row['prenomA'];
                      if ($row['id_ClMor'] ==0) {
                        $idcl=$row['id_cin_clphy'] ;
                      $c = $row['nomClphy']." ".$row['prenomClphy'] ;
                      $type='clientphy';
                      } else {  $idcl=$row['id_ClMor'] ;
                        $c=$row['nomClMor'] ;
                        $type='clientmor';
                      }
                      $ida = $row['id_cin'];
                      $msgcl ='Vous avez une consultation avec '.$a.' le '.$d.' a '.$h.'.' ;
                    $msga = 'Vous avez une nouvelle consultation avec '.$c.' le '.$d.' a '.$h.'.' ;
                  $sql8="INSERT INTO notif (id_user, user_type, msg) VALUES ($ida,'avocat','$msga') ";
                  $sql9="INSERT INTO notif (id_user, user_type, msg) VALUES ($idcl,'$type','$msgcl') ";
                    $sql6="INSERT INTO consultation(dateCons,id_aff,heure,confirm) values ('$d',$id,'$h','oui')"; 
                    $res6=$conn->query($sql6);
                    if($res6)
                    {$res9=$conn->query($sql9) ;
                      $res8=$conn->query($sql8) ;
                    }
                  }
                   /* { echo "<script>
                        window.onload = function() {
                            alert('Votre demande a été enregistrée .');
                        }
                      </script>";}
                      
                    else { echo "<script>
                        window.onload = function() {
                            alert('Erreur ');
                        }
                      </script>";*/
                    } 
                  }
                  }
                  ?>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <br />
     <div class="col-div-12" style="	width: 80%; float:left; border-radius: 10px;">
        <div class="box-8" style="width: 97.8%; margin-left:25%; background-color: #fff; height: auto; border-radius: 10px;">
        <div class="content-box">
                <p class="head-1">Consultation d'Aujourd'hui<a href="consultationsClPhy.php"><span class="voir-tout">Voir tout</span><a></p>
                <br />
                <?php 
                $aujourdhui = date('Y-m-d');
                $sql5="SELECT consultation.id_cons ,consultation.dateCons, consultation.heure, avocat.nomA, avocat.prenomA, avocat.id_cin 
                FROM consultation 
                INNER JOIN affaire ON consultation.id_aff = affaire.id_aff
                INNER JOIN client_phy ON affaire.id_cin_clphy=client_phy.id_cin_clphy
                INNER JOIN client_mor ON affaire.id_ClMor=client_mor.id_ClMor
                INNER JOIN avocat ON affaire.id_cin = avocat.id_cin 
                WHERE  consultation.dateCons='$aujourdhui'  
                AND consultation.confirm='oui'
                ORDER BY heure desc";
              
                $res5 = $conn->query($sql5);

if ($res5 && $res5->num_rows > 0) {
  echo "<table>
    <tr>
      <th>Avocat</th>
      <th>Client</th>
      <th>Date</th>
      <th>Heure</th>
    </tr>";

  while ($row5 = $res5->fetch_assoc()) {
    echo "<tr>
      <td>" . $row5['nomA'] . " " . $row5['prenomA'] . "</td>";

    if ($row5['id_ClMor'] == 0) {
      echo "<td>" . $row5['nomClphy'] . " " . $row5['prenomClphy'] . "</td>";
    } else {
      echo "<td>" . $row5['nomClMor'] . "</td>";
    }

    echo "<td>" . $row5['dateCons'] . "</td>
      <td>" . $row5['heure'] . "</td>
    </tr>";
  }

  echo "</table>";
} else {
  echo "<table>
    <tr>
      <th>Avocat</th>
      <th>Client</th>
      <th>Date</th>
      <th>Heure</th>
    </tr>
    <tr>
      <td>-</td>
      <td>-</td> 
      <td>-</td> 
      <td>-</td>
    </tr>
  </table>";
}

                 
                
               ?>
              
                 
            </div>
        </div>
    </div> 
 



    <div class="clearfix"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(".menu").click(function() {
        $("#mySidenav").css('width', '6%');
        $("#main").css('margin-left', '6%');
        $(".box-8").css('margin-left', '10%');
       // $(".box-8").css('margin-right', '3%');
        $(".logo").css('display', 'none');
        $(".logo1").css('display', 'block');
        $(".logo span").css('visibility', 'visible');
        $(".logo span").css('margin-left', '-1%');
        $(".icon-a").css('visibility', 'hidden');
        $(".icon-a").css('height', '55px');
        $(".icons").css('visibility', 'visible');
        $(".icons").css('margin-left', '-3%');
        $(".menu1").css('display', 'block');
        $(".menu").css('display', 'none');
    });

    $(".menu1").click(function() {
        $("#mySidenav").css('width', '19%');
        $("#main").css('margin-left', '19%');
        $(".box-8").css('margin-left', '23%');
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