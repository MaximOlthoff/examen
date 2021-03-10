<?php
if(isset($_GET['ID'])) {
    require_once "db/connect.php";
    $ID = mysqli_real_escape_string($conn, $_GET['ID']);
    
    $sql    = "SELECT * FROM tb_film WHERE filmid='$ID' ";
    $result = mysqli_query($conn, $sql) or die("bad query: $sql");
    $row    = mysqli_fetch_array($result);

    $result =mysqli_query($conn, $sql) or die("bad query: $sql");

} else  {
    header('location: index.php');
}
?>
<?php  echo "<h1>Bij welke cinema wilt u " .$row['titel']. " bekijken?</h1>";?>
<?php 

  $sql1 = "SELECT locatie_id, plaatsnaam, aantalstoelen FROM tb_locatie";
  $result1 = $conn->query($sql1);
  
  if ($result1->num_rows > 0) {
	echo "<table border=1 px><tr><th>Nr   </th><th>Locatie   </th><th>Stoelen   </th><th>Reserveren</th></tr>";
	// output data of each row
	while($row1 = $result1->fetch_assoc()) {
	  echo "<tr><td>".$row1["locatie_id"]."</td><td>".$row1["plaatsnaam"]."</td><td> ".$row1["aantalstoelen"]."</td><td><Button onclick=location.href='reserveren.php?ID={$row['filmid']}&LC={$row1['locatie_id']}'>meer informatie</button></td></tr>";
	}
	echo "</table>";
  } else {
    echo "0 results";
  }
    ?>