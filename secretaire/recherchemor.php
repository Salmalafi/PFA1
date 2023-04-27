<?php
$servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "bureau_avocats";
 $conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
   die("Erreur de connection : " . $conn->connect_error);
 }
 
if (isset($_GET["q"])) {
$s = $_GET["q"] ;
$sql = "SELECT * FROM client_mor WHERE nomClMor LIKE '$s%' ";
}
else {
$sql="SELECT * FROM client_mor";
}
$result = mysqli_query($conn, $sql);
// Etape 3 : Affichage des résultats de la recherche
if (mysqli_num_rows($result) > 0) {
echo"<table >
<tr> <th>Nom </th><th>adresse </th><th>Tel</th> <th> E-mail </th> </tr>";
while($row = mysqli_fetch_assoc($result)) {
echo "<tr>
<td>".$row[ 'nomClMor']."</td>
<td>".$row['adresseClMor']."</td>
<td>". $row['num_telClMor']."</td>
<td>" .$row[ 'emailClMor']."</td>";
echo '<td>
<form method="POST" action="' . (isset($s) ? 'clientmorsec.php?q='.$s : 'clientmorsec.php') . '">
   <input type="hidden" name="id" value="' . $row['id_ClMor'] . '">
    <button type="submit" name="sup" style="background-color: #FFA07A; border-radius: 20px; font-size: 12px; width: 80px; cursor: pointer;">Supprimer</button>
  </form>
</td>';
echo '</tr>' ;
}
echo "</table>";
}else {
    echo '<p style="text-align:center; margin: 0 50px;">Aucun résultat</p>';

  }
?>