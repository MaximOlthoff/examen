<?php
 $dbhost		= "localhost";
 $dbname		= "db_bioscoop";
 $dbuser		= "db_pagebuilder";
 $dbpass		= "db_pass_pagebuilder";

// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT filmid, titel, beschrijving, foto FROM tb_film";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
	echo "<table border=1 px><tr><th>Nr   </th><th>Film   </th><th>Beschrijving   </th><th>Afbeelding   </th><th>Meer informatie</th></tr>";
	// output data of each row
	while($row = $result->fetch_assoc()) {
	  echo "<tr><td>".$row["filmid"]."</td><td>".$row["titel"]."</td><td> ".$row["beschrijving"]."</td><td> ".$row["foto"]."</td><td><Button onclick=location.href='details.php?ID={$row['filmid']}'>meer informatie</button></td></tr>";
	}
	echo "</table>";
  } else {
	echo "0 results";
  }
  $conn->close();
  ?>



