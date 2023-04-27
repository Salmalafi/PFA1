<?php

$servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "bureau_avocats";
 $conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
   die("Erreur de connection : " . $conn->connect_error);
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
<title> Recherche client phy | Espace secretaire</title>
<body>
<div id="mySidenav" class="sidenav">
        <p class="logo"> <span class="menu">&#9776;</span></p>
        <p class="logo1"> <span class="menu1">&#9776;</span></p>
        <a href="#" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Table de bord</a>
        <a href="secretaire.php" class="icon-a"><i class="fa fa-home icons" ></i>&nbsp;&nbsp;Accueil</a>
        <a href="consultationsClPhy.php" class="icon-a"><i class="fa fa-calendar icons"></i> &nbsp;&nbsp;Consultations</a>
        <a href="avocatsec.php" class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Avocats</a>
        <a href="clientphysec.php" class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Client physique </a>
        <a href="clientmorsec.php" class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Client morale </a>
        <a href="NotificationClPhy.php" class="icon-a"><i class="fa fa-bell icons"></i> &nbsp;&nbsp;Notification</a>


    </div>
<div id="main">
<input style="margin-left:200px;font-size: 16px;font-color:black; width:60%;border-radius :20px; text-align: left;height:50px; background-color:#8f6118f6;margin-bottom : 50px;padding-top: 15px;"type="text" id="search" placeholder="Entrer votre texte de recherche">
    <div id="results"></div>
    </div>
    <script>
  var searchBox = document.getElementById("search");
  var resultsBox = document.getElementById("results");

  searchBox.addEventListener("input", function() {
    var searchValue = searchBox.value;
    if (searchValue.length == 0) {
      var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        resultsBox.innerHTML = this.responseText;
      }
    };
      xmlhttp.open("GET", "recherchephy.php", true) ;
      xmlhttp.send();
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        resultsBox.innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "recherchephy.php?q=" + searchValue, true);
    xmlhttp.send();
  });
document.addEventListener("DOMContentLoaded", function(event) { 
  var mainXmlhttp = new XMLHttpRequest();
 mainXmlhttp .onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        resultsBox.innerHTML = this.responseText;
      }
    };
      mainXmlhttp .open("GET", "recherchephy.php", true) ;
      mainXmlhttp .send();
});

</script>';
<?php

if (isset($_POST['sup']))
{
  $id=$_POST['id'] ;
  echo $id;
  $sql2="DELETE FROM client_phy
  WHERE id_cin_clphy=$id ";
  $res=$conn->query($sql2) ;
}
else {
echo 'Aucun résultat trouvé';
}

?>