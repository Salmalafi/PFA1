</div>
        <div class="col-div-4-1">
            <div class="box-2">
                <div class="content-box-1"style="overflow-y:scroll;">
                    <p class="head-1"> Nouvelles demandes de consultations <span><i class="fa fa-calendar icons"></i></span></p>
                    <?php 
                if ($res4 && $res4->num_rows > 0) {
                  echo" <table class='table-inter' >
                <tr> <th>Avocat</th><th> Client </th><th> Affaire </th> <th> Date </th> <th> Heure </th> </tr>";
                while($row4 = $res4->fetch_assoc()) {
                  echo "<tr>
                          <td>".$row4['nomA']." ".$row4['prenomA']."</td>";
                  if ($row4['id_ClMor'] == 0) {
                      echo "<td>".$row4['id_cin_clphy']."</td>";
                  } else {
                      echo "<td>".$row4['id_ClMor']."</td>";
                  }
                  echo "<td>".$row4['id_aff']."</td>
                  <td>".$row4['dateCons']."</td>
                        <td>".$row4['heure']."</td>";
                        echo '<td> 
                   <form method="POST" action="secretaire.php">
                    <input type="hidden" name="id" value="'.$row4['id_cons'].'">
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
      $sql = "UPDATE consultation SET confirm='oui' WHERE id_cons=$id";
      $res=$conn->query($sql) ;
    }
    if (isset($_POST['refuser'])) {
        $id=$_POST['id'] ;
       $sql="DELETE FROM consultation
       WHERE id_cons=$id ";
       $res=$conn->query($sql) ;
    }
    ?>