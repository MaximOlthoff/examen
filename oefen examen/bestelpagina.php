<link rel="stylesheet" href="styles/style.css">

<?php
require_once "db/DB.php";

$lidnummer = $_POST["lidnummer"];
session_start();

$result = mysqli_query($conn,"SELECT * FROM tb_leden where lidnummer = '$lidnummer'");
if (mysqli_num_rows($result)==0) {header("location: /index.php?ID=invalid");
}

$_SESSION["loggedin"]  = true;
$_SESSION["lidnummer"] = $lidnummer;
?>
<div class="align-center">
<?php
$result = mysqli_query($conn,"SELECT * FROM tb_producten");
echo "<table class='products' border='1'>
<tr>
<th>productnaam</th>
<th>prijs</th>
<th>image</th>
<th>status</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['productnaam'] . "</td>";
echo "<td>" . $row['prijs'] . "</td>";
echo "<td>" . $row['image'] . "</td>";
echo "<td>" . $row['status'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>
</div>
<!-- The 2 buttom buttons to confirm order or logout to cancel order-->
<div class="align-center">
    <div class="order-buttons">
        <button class="logout" onclick="window.location.href='/functions/logout.php'">logout</button>
        <button class="logout" onclick="">Winkelmand</button>
    </div>
</div>

