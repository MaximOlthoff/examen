

<?php header("Cache-Control: no-cache, no-store, must-revalidate");?>
<style>
<?php include "css/style.css";?>
</style>
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
<?php
if(isset($_GET['LC'])) {
    $LC = mysqli_real_escape_string($conn, $_GET['LC']);
    
    $sql1    = "SELECT * FROM tb_locatie WHERE locatie_id='$LC' ";
    $result1 = mysqli_query($conn, $sql1) or die("bad query: $sql1");
    $row1    = mysqli_fetch_array($result1);

    $result1 =mysqli_query($conn, $sql1) or die("bad query: $sql1");

} else  {
    header('location: index.php');
}
?>
<?php  echo "<h1>Selecteer uw plaatsen voor " .$row['titel']. " in onze cinema in " .$row1['plaatsnaam']. "</h1>";


$programma = "SELECT programma_id FROM tb_programma WHERE filmid = '$ID' AND locatie_id= '$LC' LIMIT 1";
$result2 = mysqli_query($conn, $programma) or die("bad query: $programma");
while ($row2 = $result2->fetch_assoc()) {
    $programmaID = $row2['programma_id'];
}

?>

<script>
function select(stoelnummer, programma_id, div, bool) {
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById(div).innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "responseselect.php?stoelnummer=" + stoelnummer + "&programmaid=" + programma_id + "&bool=" + bool , true);
    xhttp.send();
}
</script>
<?php


$rowNumber = $row1['aantalstoelen'] / 10;


for ($x = 1; $x <= $rowNumber; $x++) {
    if ($x >= 1) {
        echo "</div>";
    }
    echo "<div class='row' id='row$x'>";

//call 10 stoelen per gecallde rij die optellen (+10 elke rij)
    for ($y = $x * 10 - 9; $y <= $x * 10; $y++)    {
              
                $bezet = "SELECT stoelnummer FROM tb_stoel WHERE programma_id = $programmaID AND stoelnummer = $y";
                $bezet1 = mysqli_query($conn, $bezet) or die("bad query: $bezet");
                $bezet1    = mysqli_fetch_array($bezet1);
                $bezet1 = $bezet1[0];
                if($bezet1 == $y){

                $divnaam = "stoel".$y;
                echo "<div class='stoel' id='stoel$y'>
                <button class='button taken' 
                onclick='select(".$y.",".$programmaID.", \"$divnaam\" ,1 );'
                > Stoel $y</button>
                </div>";
                    }else{
                $divnaam = "stoel".$y;
                echo "<div class='stoel' id='stoel$y'>
                <button class='button empty' 
                onclick='select(".$y.",".$programmaID.", \"$divnaam\", 0);'
                > Stoel $y </button>
            </div>";
    }
}
} 
echo "<button type='submit'> <a href='index.php'>home</a> </button>";      


?>
 
