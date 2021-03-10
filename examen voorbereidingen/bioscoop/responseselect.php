<?php
//print_r($_GET);
$stoelnummer = $_GET['stoelnummer'];
$programma_id = $_GET['programmaid'];
$bool = $_GET['bool'];

include "db/connect.php";

if($bool == 0 ) { 
    $bool = 1; $class="taken"; 
    $res = "INSERT INTO tb_stoel (programma_id, stoelnummer) VALUES ('$programma_id','$stoelnummer')";
    $IRes = mysqli_query($conn, $res);
   
    
} else { 
    $bool = 0; $class="empty"; 
    $rem = "DELETE FROM tb_stoel WHERE programma_id = '$programma_id' AND stoelnummer = '$stoelnummer'";
    $DRes = mysqli_query($conn, $rem);
} 

    $divnaam = "stoel".$stoelnummer;
    echo "<div class='stoel' id='stoel$stoelnummer'>
           <button class='button $class' 
           onclick='select(".$stoelnummer.",".$programma_id.", \"$divnaam\" ,\"$bool\");'> Stoel $stoelnummer</button>
        </div>";
          
?>

