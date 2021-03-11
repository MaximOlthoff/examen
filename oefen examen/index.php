<link rel="stylesheet" href="styles/style.css">

<?php
require_once "db/DB.php";
?>

    <div class="align-center">
        <h1>Lidnummer</h1>
            <div>
                <form action="/bestelpagina.php" method="POST" autocomplete="off">
                    <input placeholder="******" class="input" type="number" id="lidnummer" name="lidnummer" pattern="\d*" max="999999" min="99999" autocomplete=“false”>
                    <br>
                    <button class="button" text="submit" type="submit"> Submit </button>
                </form>
            </div>
            <br>
            <?php 
                    if (isset($_GET["ID"])) {
                        if ($_GET["ID"] == "invalid")   {
                echo "<div class='invalid'>";
                echo "<h3>Het door u ingevoerde lidnummer bestaat niet</h3>";
                echo "</div>";
                }   
            }
            ?>
    </div>

<?php    
// $result = mysqli_query($conn,"SELECT * FROM tb_klanten");

// echo "<table border='1'>
// <tr>
// <th>uuid</th>
// <th>voornaam</th>
// <th>achternaam</th>
// <th>timestamp</th>
// <th>status</th>
// </tr>";

// while($row = mysqli_fetch_array($result))
// {
// echo "<tr>";
// echo "<td>" . $row['uuid'] . "</td>";
// echo "<td>" . $row['voornaam'] . "</td>";
// echo "<td>" . $row['achternaam'] . "</td>";
// echo "<td>" . $row['timestamp'] . "</td>";
// echo "<td>" . $row['status'] . "</td>";
// echo "</tr>";
// }
// echo "</table>";

// mysqli_close($conn);
// ?>